<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

# Models
use App\Models\Collection\Category;
use App\Models\Collection\Source;
use App\Models\Collection\Collection;

class SearchController extends Controller
{
    public function results(Request $request)
    {
        return view('contents.home.search.results', [
            'request' => $request,
            'categories' => $this->getCategories($request),
            'institutes' => $this->getInstitutes($request),
            'years' => $this->getYears($request),

            'collections' => $this->getCollection($request)
        ]);
    }

    public function getCollection(Request $request)
    {
        $category = $request->category;
        $collections = Collection::query();
        
        if ($category == 'title' || $category == 'all') {
            $collections->orWhere('title', 'like', "%$request->search%");
        }

        if ($category == 'author' || $category == 'all') {
            $collections->orWhereHas('author', function($query) use($request) {
                $query->where('name', 'like', "%$request->search%");
            });
        }

        if ($category == 'keyword' || $category == 'all') {
            $collections->orWhereHas('keywords', function($query) use($request) {
                $query->where('keyword', 'like', "%$request->search%");
            });
        }

        return $collections->paginate(10);
    }

    public function getCategories(Request $request)
    {
        return Category::whereHas('collections', function($query) use($request) {
            $category = $request->category;

            if ($category == 'title' || $category == 'all') {
                $query->orWhere('title', 'like', "%$request->search%");
            }
    
            if ($category == 'author' || $category == 'all') {
                $query->orWhereHas('author', function($query) use($request) {
                    $query->where('name', 'like', "%$request->search%");
                });
            }
    
            if ($category == 'keyword' || $category == 'all') {
                $query->orWhereHas('keywords', function($query) use($request) {
                    $query->where('keyword', 'like', "%$request->search%");
                });
            }
        })->orderBy('name')->get();
    }

    public function getInstitutes(Request $request)
    {
        return Source::whereHas('collections', function($query) use($request) {
            $category = $request->category;
            
            if ($category == 'title' || $category == 'all') {
                $query->orWhere('title', 'like', "%$request->search%");
            }
    
            if ($category == 'author' || $category == 'all') {
                $query->orWhereHas('author', function($query) use($request) {
                    $query->where('name', 'like', "%$request->search%");
                });
            }
    
            if ($category == 'keyword' || $category == 'all') {
                $query->orWhereHas('keywords', function($query) use($request) {
                    $query->where('keyword', 'like', "%$request->search%");
                });
            }
        })->orderBy('name')->get();
    }

    public function getYears(Request $request)
    {
        return Collection::select('published_year')->where('title', 'like', "%$request->search%")->groupBy('published_year')->get();
    }
}
