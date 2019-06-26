<?php

namespace App\Http\Controllers\Reference;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

# Models
use App\Models\Collection\Genre;

class GenreController extends Controller
{
    public function index()
    {
        return view('contents.reference.genre.index');
    }

    public function data(Request $request)
    {
        $genres = Genre::select(DB::raw('genres.*'))->withCount([
            'collections'
        ]);
        
        return DataTables::of($genres)
        ->addIndexColumn()
        ->editColumn('created_at', function($genre) {
            return Carbon::parse($genre->created_at)->format('d/m/Y');
        })
        ->addColumn('actions', function($genre) {
            if ($genre->collections()->exists()) return '';

            return '<a href="javascript:;" class="uk-badge uk-badge-warning" onclick="updateGenre('.$genre->id.')">Ubah</a>'.'&nbsp;&nbsp;'.'<a href="javascript:;" class="uk-badge uk-badge-danger" onclick="deleteGenre('.$genre->id.')">Hapus</a>';
        })
        ->rawColumns([
            'actions'
        ])
        ->make(true);
    }

    public function create(Request $request)
    {
        try {
            $genre = new Genre($request->all());
            $genre->save();

            return redirect()->route('reference.genre')->with('success', 'Berhasil menyimpan genre koleksi!');
        } catch (\Exception $e) {
            return redirect()->route('reference.genre')->with('error', 'Terjadi kesalahan saat menyimpan kategori koleksi!');
        }
    }

    public function updateForm(Request $request)
    {
        $genre = Genre::find($request->id);
        return view('contents.reference.genre.update-form', [
            'genre' => $genre
        ]);
    }

    public function update(Request $request)
    {
        try {
            $genre = Genre::find($request->id);
            $genre->fill($request->all());
            $genre->save();

            return redirect()->route('reference.genre')->with('success', 'Berhasil menyimpan perubahan genre koleksi!');
        } catch (\Exception $e) {
            return redirect()->route('reference.genre')->with('error', 'Terjadi kesalahan saat menyimpan perubahan genre koleksi!');
        }
    }

    public function delete(Request $request)
    {
        $genre = Genre::find($request->id);

        if (empty($genre)) return 'Terjadi kesalahan saat menghapus genre koleksi!';

        $genre->delete();
        return 'Berhasil menghapus genre koleksi!';
    }
}
