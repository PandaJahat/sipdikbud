<?php

namespace App\Http\Controllers\Integration\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Carbon;

# Models
use App\Models\Collection\Source;
use App\Models\Integration\Rekapin\Collection;
use App\Models\Collection\Collection as SipCollection;

# Jobs
use App\Jobs\Integration\Rekapin\SyncCollection;

class RekapinController extends Controller
{
    public function index()
    {
        $source = Source::where('code', 'rekapin')->first();

        return empty($source) ? 
            redirect()->route('integration.other')->with('error', 'Terjadi kesalahan, silahkan hubungi Admin.') 
            : 
            view('contents.integration.app.rekapin.index', [
            'source' => $source
        ]);
    }

    public function data(Request $request)
    {
        $collections = Collection::select('dbcollectiondetail.*')->with([
            'category'
        ]);

        return DataTables::of($collections)
        ->editColumn('published_date', function($collection) {
            return Carbon::parse($collection->published_date)->format('Y');
        })
        ->addColumn('status', function($collection) {
            return SipCollection::where('code', 'rekapin'.$collection->id)->count() > 0 ? '<span class="uk-badge uk-badge-success">Sudah</span>' : '<span class="uk-badge uk-badge-danger">Belum</span>';
        })
        ->rawColumns([
            'status'
        ])
        ->make(true);
    }

    public function sync()
    {
        SyncCollection::dispatch(Auth::user()->id);
        return 'done';
    }
}
