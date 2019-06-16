<?php

namespace App\Http\Controllers\Reference;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Carbon;

# Models
use App\Models\Collection\Institution;

class InstitutionController extends Controller
{
    public function index()
    {
        return view('contents.reference.institution.index');
    }

    public function data(Request $request)
    {
        $institutions = Institution::select(DB::raw('institutions.*'))->withCount([
            'collections'
        ]);
        
        return DataTables::of($institutions)
        ->addIndexColumn()
        ->editColumn('created_at', function($institution) {
            return Carbon::parse($institution->created_at)->format('d/m/Y');
        })
        ->addColumn('actions', function($institution) {
            if ($institution->collections()->exists()) return '';

            return '<a href="javascript:;" class="uk-badge uk-badge-warning" onclick="updateInstitution('.$institution->id.')">Ubah</a>'.'&nbsp;&nbsp;'.'<a href="javascript:;" class="uk-badge uk-badge-danger" onclick="deleteInstitution('.$institution->id.')">Hapus</a>';
        })
        ->rawColumns([
            'actions'
        ])
        ->make(true);
    }

    public function create(Request $request)
    {
        try {
            $institution = new Institution($request->all());
            $institution->save();

            return redirect()->route('reference.institution')->with('success', 'Berhasil menyimpan bidang penelitian!');
        } catch (\Exception $e) {
            return redirect()->route('reference.institution')->with('error', 'Terjadi kesalahan saat menyimpan bidang penelitian!');
        }
    }

    public function updateForm(Request $request)
    {
        $institution = Institution::find($request->id);
        return view('contents.reference.institution.update-form', [
            'institution' => $institution
        ]);
    }

    public function update(Request $request)
    {
        try {
            $institution = Institution::find($request->id);
            $institution->fill($request->all());
            $institution->save();

            return redirect()->route('reference.institution')->with('success', 'Berhasil menyimpan perubahan bidang penelitian!');
        } catch (\Exception $e) {
            return redirect()->route('reference.institution')->with('error', 'Terjadi kesalahan saat menyimpan perubahan bidang penelitian!');
        }
    }

    public function delete(Request $request)
    {
        $institution = Institution::find($request->id);

        if (empty($institution)) return 'Terjadi kesalahan saat menghapus bidang penelitian!';

        $institution->delete();
        return 'Berhasil menghapus bidang penelitian!';        
    }
}
