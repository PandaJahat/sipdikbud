<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

# Models
use App\Models\Article\Article;

# Jobs
use App\Jobs\Integration\WebPuslitjak\UpdateData;
use App\Jobs\Integration\WebPuslitjak\SyncArticle;

class ListController extends Controller
{
    public function index()
    {
        return view('contents.article.list.index');
    }

    public function data(Request $request)
    {
        $articles = Article::select(DB::raw('articles.*'))->whereNull('archived_at')->with([
            'user', 'category'
        ]);

        return DataTables::of($articles)
        ->addIndexColumn()
        ->editColumn('title', function($article) {
            return '<a href="'.route('article.detail', ['id' => Crypt::encrypt($article->id)]).'">'.$article->title.'</a>';
        })
        ->editColumn('created_at', function($article) {
            return Carbon::parse($article->created_at)->formatLocalized('%d %B %Y');
        })
        ->addColumn('actions', function($article) {
            return '<a href="'.route('article.update', ['id' => Crypt::encrypt($article->id)]).'" class="uk-badge uk-badge-warning">Ubah</a>';
        })
        ->rawColumns([
            'actions', 'title'
        ])
        ->make(true);
    }

    public function sync()
    {
        UpdateData::dispatch();
        SyncArticle::dispatch(Auth::user()->id);

        return redirect()->route('article.list')->with('success', 'Sedang dalam proses singkronisasi!');
    }
}
