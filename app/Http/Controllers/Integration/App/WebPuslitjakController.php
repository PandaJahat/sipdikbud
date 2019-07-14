<?php

namespace App\Http\Controllers\Integration\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

# Models
use App\Models\Collection\Source;
use App\Models\Integration\WebPuslitjak\Book;

# Jobs
use App\Jobs\Integration\WebPuslitjak\UpdateData;

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

        return DataTables::of($books)->make(true);
    }

    public function update()
    {
        UpdateData::dispatch();
        return 'done';
    }
}
