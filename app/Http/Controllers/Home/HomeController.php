<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use GuzzleHttp\Client;

# Models
use App\Models\Collection\Category;
use App\Models\Collection\Source;
use App\Models\Collection\Collection;
use App\Models\Setting\Slider;
use function GuzzleHttp\json_decode;

class HomeController extends Controller
{
    public function index()
    {
        $client = new Client;

        $dataverse = json_decode($client->request('GET', "https://data.lipi.go.id/api/search", [
            'query' => [
                'q' => '*',
                'type' => 'dataverse',
                'sort' => 'date'
            ],
            'headers' => [
                'X-Dataverse-key' => 'b8c3b2b4-b5ed-42e8-9fd4-bc988d0036a4'
            ]
        ])->getBody(), true);

        return view('contents.home.home.index', [
            'categories' => $this->getCategories(),
            'partners' => $this->getSources(),
            'partner_count' => (object) $this->getPartnerCount(),
            'collection_count' => $this->getCollectionCount(),
            'sliders' => Slider::all(),
            'dataverse' => $dataverse['status'] = 'OK' ? collect($dataverse['data']['items']) : null
        ]);
    }

    public function getCollectionCount()
    {
        return Collection::where('is_active', true)->count();
    }

    public function getCategories()
    {
        return Category::orderBy('name', 'asc')->withCount([
            'collections' => function($query) {
                $query->where('is_active', true);
            } 
        ])->get();
    }

    public function getSources()
    {
        return Source::withCount([
            'collections' => function($query) {
                $query->where('is_active', true);
            } 
        ])->orderBy('collections_count', 'desc')->limit(5)->get();
    }

    public function getPartnerCount()
    {
        $institute = Source::where('is_institute', true)->count();
        
        $non_institute = Source::where('is_institute', false)->count();

        $ojs = Source::where('type', 'ojs')->count();
        
        return [
            'institute' => $institute,
            'ojs' => $ojs,
            'non_institute' => $non_institute 
        ];
    }

    public function category(Request $request)
    {
        try {
            $category = Category::find(Crypt::decrypt($request->id));

            if (empty($category)) return redirect()->route('home');

            return view('contents.home.home.category',[
                'category' => $category,
                'collections' => Collection::whereHas('categories', function($query) use($category) {
                    $query->where('category_id', $category->id);
                })->where('is_active', true)->orderBy('title')->paginate(10)
            ]);
        } catch (\Exception $e) {
            return redirect()->route('home');
        }
    }
}
