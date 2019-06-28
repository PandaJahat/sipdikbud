<?php

namespace App\Http\Controllers\Integration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Carbon;

# Models
use App\Models\Collection\Source;

class OtherAppController extends Controller
{
    public function index()
    {
        return view('contents.integration.other.index');
    }

    public function data(Request $request)
    {
        $sources = Source::select(DB::raw('sources.*'))->where('type', 'other');

        if (!empty($request->date)) {
            $sources->where('date', $request->date);
        }

        return DataTables::of($sources)
        ->addIndexColumn()
        ->editColumn('name', function($source) {
            $route = empty($source->route) ? 'javascript:;' : route($source->route);

            return '<a href="'.$route.'">'.$source->name.'</a>';
        })
        ->editColumn('last_sync', function($source) {
            return empty($source) ? 'Belum' : Carbon::parse($source->last_sync)->format('d/m/Y');
        })
        ->addColumn('status', function($source) {
            return '';
        })
        ->rawColumns([
            'name', 'status'
        ])
        ->make(true);
    }
}
