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

        $collections->where('is_active', true);
        
        $collections->where(function($query) use($request) {
            if (!empty($request->publisher)) {
                $query->orWhere('published_by', 'like', "%$request->publisher%");
            }
    
            if (!empty($request->author)) {
                $query->orWhereHas('author', function($query) use($request) {
                    $query->where('name', 'like', "%$request->author%");
                });
            }
    
            if (!empty($request->title)) {
                $query->orWhere('title', 'like', "%$request->title%");
            }
            
            if (!empty($request->keyword)) {
                $query->orWhereHas('keywords', function($query) use($request) {
                    $query->where('keyword', 'like', "%$request->keyword%");
                });
            }
    
            if (!empty($request->category_id)) {
                $query->whereHas('categories', function($query) use($request) {
                    $query->where('category_id', $request->category_id);
                });
            }
        });

        $collections->orderBy('title', 'asc');

        return $collections->paginate(10);
    }
}
