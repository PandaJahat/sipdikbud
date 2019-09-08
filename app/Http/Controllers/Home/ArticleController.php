<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

# Models
use App\Models\Article\Article;

class ArticleController extends Controller
{
    public function list(Request $request)
    {
        $articles = Article::whereNull('archived_at')->orderBy('created_at')->paginate(5);

        return view('contents.home.article.list', [
            'articles' => $articles
        ]);
    }

    public function detail(Request $request)
    {
        $article = Article::find(Crypt::decrypt($request->id))->load([
            'category'
        ]);

        return view('contents.home.article.detail', [
            'article' => $article
        ]);
    }
}
