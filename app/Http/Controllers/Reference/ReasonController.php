<?php

namespace App\Http\Controllers\Reference;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Carbon;

# Models
use App\Models\Download\Reason;

class ReasonController extends Controller
{
    public function index()
    {
        return view('contents.reference.reason.index');
    }

    public function create(Request $request)
    {
        try {
            $reason = new Reason($request->all());
            $reason->save();

            return redirect()->route('reference.reason')->with('success', 'Berhasil menyimpan kategori kebermanfaatan!');
        } catch (\Exception $e) {
            return redirect()->route('reference.reason')->with('error', 'Terjadi kesalahan saat menyimpan kategori kebermanfaatan!');
        }
    }

    public function data(Request $request)
    {
        $reasons = Reason::select(DB::raw('download_reasons.*'))->withCount([
            'downloads'
        ]);
        
        return DataTables::of($reasons)
        ->addIndexColumn()
        ->editColumn('created_at', function($reason) {
            return Carbon::parse($reason->created_at)->format('d/m/Y');
        })
        ->addColumn('actions', function($reason) {
            if ($reason->downloads()->exists()) return '';

            return '<a href="javascript:;" class="uk-badge uk-badge-warning" onclick="updateReason('.$reason->id.')">Ubah</a>'.'&nbsp;&nbsp;'.'<a href="javascript:;" class="uk-badge uk-badge-danger" onclick="deleteReason('.$reason->id.')">Hapus</a>';
        })
        ->rawColumns([
            'actions'
        ])
        ->make(true);
    }

    public function updateForm(Request $request)
    {
        $reason = Reason::find($request->id);
        return view('contents.reference.reason.update-form', [
            'reason' => $reason
        ]);
    }

    public function update(Request $request)
    {
        try {
            $reason = Reason::find($request->id);
            $reason->fill($request->all());
            $reason->save();

            return redirect()->route('reference.reason')->with('success', 'Berhasil menyimpan perubahan kategori kebermanfaatan!');
        } catch (\Exception $e) {
            return redirect()->route('reference.reason')->with('error', 'Terjadi kesalahan saat menyimpan perubahan kategori kebermanfaatan!');
        }
    }

    public function delete(Request $request)
    {
        $reason = Reason::find($request->id);

        if (empty($reason)) return 'Terjadi kesalahan saat menghapus kategori kebermanfaatan!';

        $reason->delete();
        return 'Berhasil menghapus kategori kebermanfaatan!';        
    }
}
