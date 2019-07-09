<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

# Models
use App\Models\Collection\Category;
use App\Models\Collection\Source;
use App\Models\Collection\Collection;
use App\Models\Setting\Slider;

class HomeController extends Controller
{
    public function index()
    {
        return view('contents.home.home.index', [
            'categories' => $this->getCategories(),
            'partners' => $this->getSources(),
            'partner_count' => (object) $this->getPartnerCount(),
            'collection_count' => $this->getCollectionCount(),
            'sliders' => Slider::all()
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
        return view('contents.home.home.category',[
            'category' => Category::find($request->category),
            'collections' => Collection::whereHas('categories', function($query) use($request) {
                $query->where('category_id', $request->category);
            })->where('is_active', true)->paginate(10)
        ]);
    }
}
