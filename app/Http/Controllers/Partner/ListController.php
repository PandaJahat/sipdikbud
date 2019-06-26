<?php

namespace App\Http\Controllers\Partner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

# Models
use App\Models\Collection\Source;

class ListController extends Controller
{
    public function index()
    {
        # code...
    }

    public function data(Request $request)
    {
        $sources = Source::select(DB::raw('sources.*'))->withCount([
            'collections'
        ]);

        return DataTables::of($sources)->make(true);
    }
}
