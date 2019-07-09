<?php

namespace App\Http\Controllers\Reference;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Carbon;

# Models
use App\Models\Reference\Request as Reference_request;
use App\Models\Reference\Request_category;

class RequestController extends Controller
{
    public function index()
    {
        return view('contents.reference.request.index', [
            'categories' => $this->getCategories()
        ]);
    }

    public function data(Request $request)
    {
        setlocale(LC_ALL, 'id_ID.utf8');
        $user = Auth::user();

        $reference_requests = Reference_request::select(DB::raw('reference_requests.*'))->with([
            'category', 'user'
        ]);

        if (Auth::user()->hasRole(['researcher', 'reviewer'])) {
            $reference_requests->where('user_id', Auth::user()->id);
        }

        return DataTables::of($reference_requests)
        ->addIndexColumn()
        ->editColumn('status', function($reference_request) {
            if ($reference_request->status === NULL) {
                return '<span class="uk-badge uk-badge-warning">Menunggu</span>';
            }

            return $reference_request->status ? '<span class="uk-badge uk-badge-success">Diterima</span>' : '<span class="uk-badge uk-badge-danger">Ditolak</span>';
        })
        ->editColumn('created_at', function($reference_request) {
            return Carbon::parse($reference_request->created_at)->formatLocalized('%d %B %Y');
        })
        ->addColumn('actions', function($reference_request) use($user) {
            if ($user->hasRole('researcher')) {
                return $reference_request->status !== NULL ? '' : '<a href="javascript:;" class="uk-badge uk-badge-danger" onclick="deleteRequest('.$reference_request->id.')">Hapus</a>';
            }

            return $reference_request->status !== NULL ? '' : '<a href="javascript:;" class="uk-badge uk-badge-primary" onclick="verifRequest('.$reference_request->id.')">Verifikasi</a>';
        })
        ->rawColumns([
            'actions', 'status'
        ])
        ->make(true);
    }

    public function create(Request $request)
    {
        try {
            $reference_request = new Reference_request($request->all());
            $reference_request->category_id = Request_category::where('code', $request->category)->first()->id;
            $reference_request->user_id = Auth::user()->id;

            $reference_request->save();
            return redirect()->route('reference.request')->with('success', 'Berhasil menyimpan permohonan!');
        } catch (\Exception $e) {
            return redirect()->route('reference.request')->with('error', 'Terjadi kesalahan saat menyimpan permohonan!');
        }
    }

    public function delete(Request $request)
    {
        $reference_request = Reference_request::find($request->id);

        if (empty($reference_request)) return 'Terjadi kesalahan saat menghapus permohonan referensi!';

        $reference_request->delete();
        return 'Berhasil menghapus permohonan referensi!';   
    }

    private function getCategories()
    {
        return Request_category::all();
    }
}
