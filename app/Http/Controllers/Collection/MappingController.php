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
use App\User;

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
            return '<a href="'.route('collection.mapping.detail', ['id' => Crypt::encrypt($collection->id)]).'">'.$collection->title.'</a>';
        })
        ->editColumn('created_at', function($collection) {
            return Carbon::parse($collection->created_at)->formatLocalized('%d %B %Y');
        })
        ->editColumn('is_active', function($collection) {
            if (empty($collection->source_id)) {
                if (!$collection->reviewer()->exists()) {
                    return '<span class="uk-badge uk-badge-danger">Belum</span>';
                } else {
                    if (!$collection->reviewer->results()->exists()) {
                        return '<span class="uk-badge uk-badge-warning">Menunggu</span>';
                    }
                }
            }

            return $collection->is_active ? '<span class="uk-badge uk-badge-success">Layak</span>' : '<span class="uk-badge uk-badge-danger">Tidak Layak</span>';
        })
        ->addColumn('category', function($collection) {
            return $collection->categories()->exists() ? $collection->category->name : '-';
        })
        ->addColumn('actions', function($collection) {
            return '<a href="'.route('collection.mapping.detail', ['id' => Crypt::encrypt($collection->id)]).'" class="uk-badge uk-badge-primary">Moderasi</a>';
        })
        ->rawColumns([
            'actions', 'title', 'is_active'
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
            return redirect()->route('collection.mapping')->with('error', 'Publikasi tidak ditemukan!');
        }
    }

    public function save(Request $request)
    {
        try {
            $collection = Collection::find($request->id);
            $collection->institutions()->detach();
            $collection->related_collections()->detach();
            
            if (!empty($request->institutions)) {
                $collection->institutions()->attach($request->institutions, [
                    'user_id' => Auth::user()->id
                ]);
            }

            if (!empty($request->related_collections)) {
                $collection->related_collections()->attach($request->related_collections);
            }

            return redirect()->route('collection.mapping.detail', ['id' => Crypt::encrypt($collection->id)])->with('success', 'Publikasi berhasil dimoderasi!');
        } catch (\Throwable $th) {
            return redirect()->route('collection.mapping')->with('error', 'Terjadi kesalahan saat moderasi penelitian!');
        }
    }

    public function getInstitutions()
    {
        return Institution::orderBy('name', 'asc')->get();
    }

    public function getCollections(Request $request)
    {
        return Collection::select('id', 'title')->where('id', '!=', $request->id)->get();
    }

    public function dataReviewer(Request $request)
    {
        $users = User::select(DB::raw('users.*'))->whereHas('roles', function($query) {
            $query->where('name', 'reviewer');
        })->with(['profile']);

        return DataTables::of($users)
        ->addIndexColumn()
        ->editColumn('id', function($user) {
            return '<input type="radio" name="reviewer_id" class="select_reviewer" id="check_'.$user->id.'" value="'.$user->id.'" />';
        })
        ->editColumn('name', function($user) {
            return '<label for="check_'.$user->id.'" id="reviewer_name_'.$user->id.'">'.$user->name.'</label>';
        })
        ->editColumn('profile.institute', function($user) {
            return '<label for="check_'.$user->id.'" id="reviewer_institute_'.$user->id.'">'.$user->profile->institute.'</label>';
        })
        ->rawColumns([
            'id', 'name', 'profile.institute'
        ])
        ->make(true);
    }

    public function saveReviewer(Request $request)
    {
        $collection = Collection::find($request->collection_id);
        
        if ($collection->reviewer()->exists()) $collection->reviewer()->delete();

        $collection->reviewer()->create([
            "user_id" => $request->user_id,
            "note" => $request->note,
        ]);

        return redirect()->route('collection.mapping.detail', ['id' => Crypt::encrypt($collection->id)])->with('success', 'Berhasil memilih reviewer!');
    }
}
