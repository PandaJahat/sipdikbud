<?php

namespace App\Http\Controllers\Collection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;

# Models
use App\Models\Collection\Collection;

class FavoriteController extends Controller
{
    public function index()
    {
        return view('contents.collection.favorite.index');
    }

    public function data(Request $request)
    {
        setlocale(LC_ALL, 'id_ID.utf8');
        
        $collections = Collection::select(DB::raw('collections.*'))->with([
            'author', 'language'
        ])->whereHas('favorites', function($query) use($request) {
            $query->where('user_id', $request->user_id);
        });

        return DataTables::of($collections)
        ->addIndexColumn()
        ->editColumn('title', function($collection) use($request) {
            $class = $collection->is_active ? '' : 'uk-text-muted';
            return '<a class="'.$class.'" href="'.route('collection.detail', ['id' => Crypt::encrypt($collection->id), 'prev_url' => !empty($request->prev_url) ? $request->prev_url : NULL]).'">'.$collection->title.'</a>';
        })
        ->editColumn('created_at', function($collection) {
            return Carbon::parse($collection->created_at)->formatLocalized('%d %B %Y');
        })
        ->rawColumns([
            'title'
        ])
        ->make(true);
    }
}
