<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

# Models
use App\Models\Article\Article;

class DetailController extends Controller
{
    public function index(Request $request)
    {
        try {
            $article = Article::find(Crypt::decrypt($request->id))->load([
                'category', 'user'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('article.list')->with('error', $e->getMessage());
        }

        return view('contents.article.detail.index', [
            'article' => $article
        ]);
    }
}
