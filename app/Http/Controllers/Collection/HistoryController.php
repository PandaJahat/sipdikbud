<?php

namespace App\Http\Controllers\Collection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;

# Models
use App\Models\Download\Collection;

class HistoryController extends Controller
{
    public function index()
    {
        return view('contents.collection.history.index');
    }

    public function data(Request $request)
    {
        setlocale(LC_ALL, 'id_ID.utf8');

        $downloads = Collection::select(DB::raw('collection_downloads.*'))
        ->where('user_id', $request->user_id)->with([
            'reason', 'collection.author'
        ]);

        return DataTables::of($downloads)
        ->addIndexColumn()
        ->editColumn('created_at', function($download) {
            return Carbon::parse($download->created_at)->formatLocalized('%d %B %Y - %H:%M');
        })
        ->editColumn('collection.title', function($download) use($request) {
            $class = $download->collection->is_active ? '' : 'uk-text-muted';
            return '<a class="'.$class.'" href="'.route('collection.detail', ['id' => Crypt::encrypt($download->collection->id), 'prev_url' => !empty($request->prev_url) ? $request->prev_url : NULL]).'">'.$download->collection->title.'</a>';
        })
        ->rawColumns([
            'collection.title'
        ])
        ->make(true);
    }
}
