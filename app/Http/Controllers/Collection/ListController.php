<?php

namespace App\Http\Controllers\Collection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Carbon;

# Models
use App\Models\Collection\Collection;

class ListController extends Controller
{
    public function index()
    {
        return view('contents.collection.list.index');
    }

    public function data(Request $request)
    {
        setlocale(LC_ALL, 'id_ID.utf8');

        $collections = Collection::select(DB::raw('collections.*'))->with([
            'author', 'language'
        ]);

        return DataTables::of($collections)
        ->addIndexColumn()
        ->editColumn('created_at', function($collection) {
            return Carbon::parse($collection->created_at)->formatLocalized('%d %B %Y');
        })
        ->addColumn('actions', function($collection) {
            return '<a href="'.route('collection.update', ['id' => $collection->id]).'" class="uk-badge uk-badge-warning">Ubah</a>'.'&nbsp;&nbsp;'.'<a href="javascript:;" class="uk-badge uk-badge-danger" onclick="deleteCollection('.$collection->id.')">Hapus</a>';
        })
        ->rawColumns([
            'actions'
        ])
        ->make(true);
    }

    public function delete(Request $request)
    {
        $collection = Collection::find($request->id);
        
        if (empty($collection)) return 'Penelitian tidak ditemukan!';

        $collection->delete();
        return 'Penelitian berhasil dihapus!';
    }

    public function downloadForm(Request $request)
    {
        # code...
    }
}
