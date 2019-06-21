<?php

namespace App\Http\Controllers\Collection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

# Models
use App\Models\Collection\Collection;
use App\Models\Collection\Institution;

class MappingController extends Controller
{
    public function index()
    {
        return view('contents.collection.mapping.index');
    }

    public function data(Request $request)
    {
        setlocale(LC_ALL, 'id_ID.utf8');
        $user = Auth::user();

        $collections = Collection::select(DB::raw('collections.*'))->with([
            'author', 'language'
        ])->withCount([
            'institutions'
        ]);

        if ($user->hasRole('researcher')) {
            $collections->where('user_id', $user->id);
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
        ->editColumn('institutions_count', function($collection) {
            return $collection->institutions_count == 0 ? '<span class="uk-badge uk-badge-danger">Belum</span>' : '<span class="uk-badge uk-badge-success">Sudah</span>';
        })
        ->addColumn('category', function($collection) {
            return $collection->categories()->exists() ? $collection->category->name : '-';
        })
        ->addColumn('actions', function($collection) {
            return '<a href="'.route('collection.mapping.detail', ['id' => Crypt::encrypt($collection->id)]).'" class="uk-badge uk-badge-primary">Moderasi</a>';
        })
        ->rawColumns([
            'actions', 'title', 'institutions_count'
        ])
        ->make(true);
    }

    public function detail(Request $request)
    {
        setlocale(LC_ALL, 'id_ID.utf8');
        
        try {
            $collection = Collection::find(Crypt::decrypt($request->id))->load([
                'keywords', 'language', 'author', 'user', 'institutions'
            ]);
    
            return view('contents.collection.mapping.detail', [
                'collection' => $collection
            ]);
        } catch (\Exception $e) {
            return redirect()->route('collection.mapping')->with('error', 'Penelitian tidak ditemukan!');
        }
    }

    public function save(Request $request)
    {
        try {
            $collection = Collection::find($request->id);
            $collection->institutions()->detach();
            
            if (!empty($request->institutions)) {
                $collection->institutions()->attach($request->institutions, [
                    'user_id' => Auth::user()->id
                ]);
            }

            return redirect()->route('collection.mapping.detail', ['id' => Crypt::encrypt($collection->id)])->with('success', 'Penelitian berhasil dimoderasi!');
        } catch (\Throwable $th) {
            return redirect()->route('collection.mapping')->with('error', 'Terjadi kesalahan saat moderasi penelitian!');
        }
    }

    public function getInstitutions()
    {
        return Institution::orderBy('name', 'asc')->get();
    }
}
