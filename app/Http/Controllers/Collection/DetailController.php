<?php

namespace App\Http\Controllers\Collection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

# Models
use App\Models\Collection\Collection;

class DetailController extends Controller
{
    public function index(Request $request)
    {
        setlocale(LC_ALL, 'id_ID.utf8');
        
        $collection = Collection::find($request->id)->load([
            'keywords', 'language', 'author', 'user'
        ]);

        return view('contents.collection.detail.index', [
            'collection' => $collection
        ]);
    }
}
