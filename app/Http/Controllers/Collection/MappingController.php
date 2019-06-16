<?php

namespace App\Http\Controllers\Collection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

# Models
use App\Models\Collection\Collection;

class MappingController extends Controller
{
    public function index()
    {
        return view('contents.collection.mapping.index');
    }

    public function data(Request $request)
    {
        setlocale(LC_ALL, 'id_ID.utf8');

        $collections = Collection::select(DB::raw('collections.*'))->with([
            'author', 'language'
        ])->withCount([
            'institutions'
        ]);

        return DataTables::of($collections)
        ->addIndexColumn()
        ->editColumn('title', function($collection) {
            $class = $collection->is_active ? '' : 'uk-text-muted';
            return '<a class="'.$class.'" href="'.route('collection.detail', ['id' => $collection->id]).'" target="_blank">'.$collection->title.'</a>';
        })
        ->editColumn('created_at', function($collection) {
            return Carbon::parse($collection->created_at)->formatLocalized('%d %B %Y');
        })
        ->editColumn('institutions_count', function($collection) {
            return $collection->institutions_count == 0 ? '<span class="uk-badge uk-badge-danger">Belum</span>' : '<span class="uk-badge uk-badge-success">Sudah</span>';
        })
        ->addColumn('category', function($collection) {
            return $collection->categories()->exists() ? $collection->category->name : '-';
        })
        ->addColumn('actions', function($collection) {
            return '<a href="" class="uk-badge uk-badge-primary">Moderasi</a>';
        })
        ->rawColumns([
            'actions', 'title', 'institutions_count'
        ])
        ->make(true);
    }
}
