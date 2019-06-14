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
        ->make(true);
    }
}
