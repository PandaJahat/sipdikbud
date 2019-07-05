<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

# Models
use App\Models\Collection\Collection;

class DetailController extends Controller
{
    public function index(Request $request)
    {
        try {
            $collection = Collection::find(Crypt::decrypt($request->collection))->load([
                'keywords', 'language', 'author', 'source', 'genres', 'topics'
            ]);

            return view('contents.home.detail.index', [
                'collection' => $collection
            ]);
        } catch (\Exception $e) {
            return redirect()->route('home');
        }
    }
}
