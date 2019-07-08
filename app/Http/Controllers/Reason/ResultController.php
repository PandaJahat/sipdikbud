<?php

namespace App\Http\Controllers\Reason;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;

# Models
use App\Models\Download\Collection;

class ResultController extends Controller
{
    public function index()
    {
        return view('contents.reason.result.index');
    }

    public function data(Request $request)
    {
        setlocale(LC_ALL, 'id_ID.utf8');

        $reasons = Collection::select(DB::raw('collection_downloads.*'))->with([
            'reason', 'user'
        ]);

        return DataTables::of($reasons)
        ->addIndexColumn()
        ->editColumn('created_at', function($reason) {
            return Carbon::parse($reason->created_at)->formatLocalized('%d %B %Y - %H:%M');
        })
        ->addColumn('action', function($reason) use($request){
            return '<a href="'.route('collection.detail', ['id' => Crypt::encrypt($reason->collection_id), 'prev_url' => $request->prev_url]).'" class="uk-badge uk-badge-primary">Lihat</a>';
        })
        ->addColumn('category', function($reason) {
            return empty($reason->reason_id) ? 'Lainnya' : $reason->reason->name;
        })
        ->rawColumns([
            'action'
        ])
        ->make(true);
    }
}
