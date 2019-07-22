<?php

namespace App\Http\Controllers\Integration\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

# Models
use App\Models\Collection\Source;
use App\Models\Integration\WebPuslitjak\Book;
use App\Models\Integration\WebPuslitjak\Category;

use App\Models\Collection\Collection;

# Jobs
use App\Jobs\Integration\WebPuslitjak\UpdateData;
use App\Jobs\Integration\WebPuslitjak\SyncBook;

class WebPuslitjakController extends Controller
{
    public function index()
    {
        $source = Source::where('code', 'web-puslitjak')->first();

        if (empty($source)) return redirect()->route('integration.other')->with('error', 'Terjadi kesalahan, silahkan hubungi Admin.');

        return view('contents.integration.app.web-puslitjak.index', [
            'source' => $source
        ]);
    }

    public function data(Request $request)
    {
        $books = Book::select(DB::raw('buku.*'));

        return DataTables::of($books)
        ->addColumn('author', function() {
            return 'Web Puslitjak';
        })
        ->editColumn('id', function($book) {
            return Collection::where('code', 'webpuslitjak'.$book->id)->count() > 0 ? '<span class="uk-badge uk-badge-success">Sudah</span>' : '<span class="uk-badge uk-badge-danger">Belum</span>';
        })
        ->editColumn('id_bidang', function($book) {

            return implode(', ', (array) Category::whereIn('id', explode(',', $book->id_bidang))->get()->pluck('nama')->toArray());
        })
        ->rawColumns(['id'])
        ->make(true);
    }

    public function update()
    {
        UpdateData::dispatch();
        return 'done';
    }

    public function sync(Request $request)
    {
        SyncBook::dispatch($request->id);
        return 'done';
    }
}
