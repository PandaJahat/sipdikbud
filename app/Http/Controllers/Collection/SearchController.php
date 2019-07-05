<?php

namespace App\Http\Controllers\Collection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

# Models
use App\Models\Collection\Collection;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        session()->flashInput($request->input());
        
        return view('contents.collection.search.index', [
            'collections' => empty($request->all()) ? NULL : $this->getCollection($request)
        ]);
    }

    public function getCollection(Request $request)
    {
        $collections = Collection::query()->withCount([
            'favorites', 'comments'
        ]);
        
        if (!empty($request->publisher)) {
            $collections->orWhere('published_by', 'like', "%$request->publisher%");
        }

        if (!empty($request->author)) {
            $collections->orWhereHas('author', function($query) use($request) {
                $query->where('name', 'like', "%$request->author%");
            });
        }

        if (!empty($request->title)) {
            $collections->orWhere('title', 'like', "%$request->title%");
        }
        
        if (!empty($request->keywords)) {
            $collections->orWhereHas('keywords', function($query) use($request) {
                $query->where('keyword', 'like', "%$request->keywords%");
            });
        }

        if (!empty($request->category_id)) {
            $collections->whereHas('categories', function($query) use($request) {
                $query->where('category_id', $request->category_id);
            });
        }

        $collections->orderBy('title', 'asc');

        return $collections->paginate(10);
    }
}
