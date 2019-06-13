<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

# Models
use App\User;

class ListController extends Controller
{
    public function index()
    {
        return view('contents.user.list.index');
    }

    public function data(Request $request)
    {
        $users = User::select(DB::raw('users.*'))->has('profile');

        return DataTables::of($users)
        ->addIndexColumn()
        ->editColumn('created_at', function($user) {
            return Carbon::parse($user->created_at)->format('d/m/Y');
        })
        ->addColumn('role', function($user) {
            return empty($user->roles->first()->display_name) ? '' : $user->roles->first()->display_name;
        })
        ->addColumn('actions', function($user) {
            return '<a href="'.route('user.update', ['id' => $user->id]).'" class="uk-badge uk-badge-warning">Ubah</a>'.'&nbsp;&nbsp;'.'<a href="javascript:;" class="uk-badge uk-badge-danger" onclick="deleteUser('.$user->id.')">Hapus</a>';
        })
        ->rawColumns([
            'actions'
        ])
        ->make(true);
    }

    public function delete(Request $request)
    {
        $user = User::find($request->id);

        if (empty($user)) return 'Terjadi kesalahan saat menghapus pengguna!';
        if ($user->profile()->exists()) $user->profile->delete();
        
        $user->delete();
        
        return 'Pengguna berhasil dihapus!';
    }
}
