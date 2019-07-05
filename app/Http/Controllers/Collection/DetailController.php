<?php

namespace App\Http\Controllers\Collection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

# Models
use App\User;
use App\Models\Collection\Collection;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function index(Request $request)
    {
        // try {
            setlocale(LC_ALL, 'id_ID.utf8');
        
            $collection = Collection::find(Crypt::decrypt($request->id))->load([
                'keywords', 'language', 'author', 'user', 'comments.user'
            ]);

            return view('contents.collection.detail.index', [
                'collection' => $collection,
                'prev_url' => empty($request->prev_url) ? NULL : Crypt::decrypt($request->prev_url)
            ]);
        // } catch (\Exception $e) {
        //     return redirect()->route('collection.list')->with('error', 'Publikasi tidak ditemukan!');
        // }
    }

    public function addFavorite(Request $request)
    {
        $collection = Collection::find($request->id);

        if ($request->is_favorite == 1) {
            $collection->favorites()->attach([$request->user_id]);
        } else {
            $collection->favorites()->wherePivot('user_id', $request->user_id)->detach();
        }

        return $request->is_favorite == 1 ? 'add' : 'remove';
    }

    public function addComment(Request $request)
    {
        $collection = Collection::find($request->id);
        $collection->comments()->create([
            "text" => $request->comment,
            "user_id" => Auth::user()->id
        ]);

        return redirect()->route('collection.detail', ['id' => Crypt::encrypt($collection->id), 'prev_url' => $request->prev_url]);
    }
}
