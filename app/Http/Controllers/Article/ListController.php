<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

# Models
use App\Models\Article\Article;

class ListController extends Controller
{
    public function index()
    {
        return view('contents.article.list.index');
    }

    public function data(Request $request)
    {
        $articles = Article::select(DB::raw('articles.*'))->whereNull('archived_at');

        return DataTables::of($articles)->make(true);
    }
}
