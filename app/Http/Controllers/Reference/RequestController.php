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
use App\Models\Collection\Category;
use App\Models\Collection\Language;
use App\Models\Collection\Genre;
use App\Models\Collection\Institution;
use App\Models\Download\Reason;

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
            if ($user->hasRole(['researcher', 'reviewer'])) {
                return $reference_request->status !== NULL ? '' : '<a href="javascript:;" class="uk-badge uk-badge-danger" onclick="deleteRequest('.$reference_request->id.')">Hapus</a>';
            }

            return $reference_request->status !== NULL ? '' : '<a href="javascript:;" class="uk-badge uk-badge-primary" onclick="acceptRequest('.$reference_request->id.')">Setujui</a>'
            .'&nbsp;&nbsp;'.'<a href="javascript:;" class="uk-badge uk-badge-danger" onclick="rejectRequest('.$reference_request->id.')">Tolak</a>';
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

    public function accept(Request $request)
    {
        $reference_request = Reference_request::find($request->id)->load([
            'category'
        ]);

        if (empty($reference_request)) return 'Terjadi kesalahan saat menyetujui permohonan referensi!';

        switch ($reference_request->category->code) {
            case 'category':
                $category = new Category([
                    'name' => $reference_request->data
                ]);
                $category->save();
                break;
            case 'language':
                $language = new Language([
                    'name' => $reference_request->data,
                    'code' => $reference_request->additional_data
                ]);
                $language->save();
                break;
            case 'genre':
                $genre = new Genre([
                    'name' => $reference_request->data
                ]);
                $genre->save();
                break;
            case 'institution':
                $institution = new Institution([
                    'name' => $reference_request->data
                ]);
                $institution->save();
                break;
            case 'reason':
                $reason = new Reason([
                    'name' => $reference_request->data,
                    'order' => Reason::count()+1
                ]);
                $reason->save();
                break;
            default:
                # code...
                break;
        }

        $reference_request->status = true;
        $reference_request->save();

        return 'Berhasil menyetujui permohonan referensi!';
    }

    public function reject(Request $request)
    {
        $reference_request = Reference_request::find($request->id);
        
        if (empty($reference_request)) return 'Terjadi kesalahan saat menolak permohonan referensi!';

        $reference_request->status = false;
        $reference_request->save();

        return 'Berhasil menolak permohonan referensi!';
    }
}
