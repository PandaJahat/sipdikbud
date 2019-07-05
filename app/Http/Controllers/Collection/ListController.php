<?php

namespace App\Http\Controllers\Collection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;

# Models
use App\Models\Collection\Collection;
use App\User;

class ListController extends Controller
{
    public function index()
    {
        return view('contents.collection.list.index');
    }

    public function data(Request $request)
    {
        setlocale(LC_ALL, 'id_ID.utf8');
        
        $collections = Collection::select(DB::raw('collections.*'))->with([
            'author', 'language'
        ]);
            
        if (!empty($request->user_id)) {
            $user = User::find($request->user_id);
            if ($user->hasRole('researcher')) {
                $collections->where('user_id', $user->id);
            }
        }

        return DataTables::of($collections)
        ->addIndexColumn()
        ->editColumn('title', function($collection) {
            $class = $collection->is_active ? '' : 'uk-text-muted';
            return '<a class="'.$class.'" href="'.route('collection.detail', ['id' => Crypt::encrypt($collection->id)]).'">'.$collection->title.'</a>';
        })
        ->editColumn('created_at', function($collection) {
            return Carbon::parse($collection->created_at)->formatLocalized('%d %B %Y');
        })
        ->addColumn('actions', function($collection) {
            return '<a href="'.route('collection.update', ['id' => $collection->id]).'" class="uk-badge uk-badge-warning">Ubah</a>'.'&nbsp;&nbsp;'.'<a href="javascript:;" class="uk-badge uk-badge-danger" onclick="deleteCollection('.$collection->id.')">Hapus</a>';
        })
        ->rawColumns([
            'actions', 'title'
        ])
        ->make(true);
    }

    public function delete(Request $request)
    {
        $collection = Collection::find($request->id);
        
        if (empty($collection)) return 'Publikasi tidak ditemukan!';

        $collection->delete();
        return 'Publikasi berhasil dihapus!';
    }

    public function downloadForm(Request $request)
    {
        return '';
    }
}
