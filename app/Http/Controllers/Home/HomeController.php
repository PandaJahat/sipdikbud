<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

# Models
use App\Models\Collection\Category;
use App\Models\Collection\Source;

class HomeController extends Controller
{
    public function index()
    {
        return view('contents.home.home.index', [
            'categories' => $this->getCategories(),
            'partners' => $this->getSources(),
            'partner_count' => (object) $this->getPartnerCount()
        ]);
    }

    public function getCategories()
    {
        return Category::orderBy('name', 'asc')->get();
    }

    public function getSources()
    {
        return Source::withCount('collections')->orderBy('collections_count', 'desc')->limit(5)->get();
    }

    public function getPartnerCount()
    {
        $institute = Source::where('is_institute', true)->count();
        
        $non_institute = Source::where('is_institute', false)->count();
        
        return [
            'institute' => $institute,
            'repository' => 0,
            'non_institute' => $non_institute 
        ];
    }
}
