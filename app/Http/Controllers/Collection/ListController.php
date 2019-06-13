<?php

namespace App\Http\Controllers\Collection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    public function index()
    {
        return view('contents.collection.list.index');
    }

    public function data(Request $request)
    {
        # code...
    }
}
