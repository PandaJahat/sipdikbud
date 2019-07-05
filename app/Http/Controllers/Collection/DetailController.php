<?php

namespace App\Http\Controllers\Collection;

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
            setlocale(LC_ALL, 'id_ID.utf8');
        
            $collection = Collection::find(Crypt::decrypt($request->id))->load([
                'keywords', 'language', 'author', 'user'
            ]);

            return view('contents.collection.detail.index', [
                'collection' => $collection,
                'prev_url' => empty($request->prev_url) ? NULL : Crypt::decrypt($request->prev_url)
            ]);
        } catch (\Exception $e) {
            return redirect()->route('collection.list')->with('error', 'Publikasi tidak ditemukan!');
        }
    }
}
