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
            'collections' => $this->getCollection($request)
        ]);
    }

    public function getCollection(Request $request)
    {
        $category = $request->category;
        $collections = Collection::query();
        
        if (!empty($request->publisher)) {
            $collections->orWhere('published_by', 'like', "%$request->publisher%");
        }

        if (!empty($request->author)) {
            $collections->orWhereHas('author', function($query) use($request) {
                $query->where('name', 'like', "%$request->author%");
            });
        }

        if (!empty($request->keywords)) {
            $collections->orWhereHas('keywords', function($query) use($request) {
                $query->where('keyword', 'like', "%$request->keywords%");
            });

            $collections->orWhere('title', 'like', "%$request->keywords%");
        }

        $collections->orderBy('title', 'asc');

        return $collections->paginate(10);
    }

    public function getCategories(Request $request)
    {
        return Category::whereHas('collections', function($query) use($request) {
            if (!empty($request->publisher)) {
                $query->orWhere('published_by', 'like', "%$request->publisher%");
            }
    
            if (!empty($request->author)) {
                $query->orWhereHas('author', function($query) use($request) {
                    $query->where('name', 'like', "%$request->author%");
                });
            }
    
            if (!empty($request->keywords)) {
                $query->orWhereHas('keywords', function($query) use($request) {
                    $query->where('keyword', 'like', "%$request->keywords%");
                });
    
                $query->orWhere('title', 'like', "%$request->keywords%");
            }
        })->orderBy('name')->get();
    }
}
