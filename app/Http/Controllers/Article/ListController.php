<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    public function index()
    {
        return view('contents.article.list.index');
    }

    public function data(Request $request)
    {
        # code...
    }
}
