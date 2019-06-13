<?php

namespace App\Http\Controllers\Reference;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Carbon;

# Models
use App\Models\Collection\Language;

class LanguageController extends Controller
{
    public function index()
    {
        return view('contents.reference.language.index');
    }

    public function data(Request $request)
    {
        $languages = Language::select(DB::raw('collection_languages.*'))->withCount([
            'collections'
        ]);
        
        return DataTables::of($languages)
        ->addIndexColumn()
        ->editColumn('created_at', function($language) {
            return Carbon::parse($language->created_at)->format('d/m/Y');
        })
        ->addColumn('actions', function($language) {
            return '<a href="javascript:;" class="uk-badge uk-badge-warning" onclick="updateLanguage('.$language->id.')">Ubah</a>'.'&nbsp;&nbsp;'.'<a href="javascript:;" class="uk-badge uk-badge-danger" onclick="deleteLanguage('.$language->id.')">Hapus</a>';
        })
        ->rawColumns([
            'actions'
        ])
        ->make(true);
    }

    public function create(Request $request)
    {
        try {
            $language = new Language($request->all());
            $language->save();

            return redirect()->route('reference.language')->with('success', 'Berhasil menyimpan kategori!');
        } catch (\Exception $e) {
            return redirect()->route('reference.language')->with('error', 'Terjadi kesalahan saat menyimpan kategori!');
        }
    }

    public function updateForm(Request $request)
    {
        $language = Language::find($request->id);
        return view('contents.reference.language.update-form', [
            'language' => $language
        ]);
    }

    public function update(Request $request)
    {
        try {
            $language = Language::find($request->id);
            $language->fill($request->all());
            $language->save();

            return redirect()->route('reference.language')->with('success', 'Berhasil menyimpan perubahan kategori!');
        } catch (\Exception $e) {
            return redirect()->route('reference.language')->with('error', 'Terjadi kesalahan saat menyimpan perubahan kategori!');
        }
    }

    public function delete(Request $request)
    {
        $language = Language::find($request->id);

        if (empty($language)) return 'Terjadi kesalahan saat menghapus kategori!';

        $language->delete();
        return 'Berhasil menghapus kategori';        
    }
}
