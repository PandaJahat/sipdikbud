<?php

namespace App\Http\Controllers\Integration\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RekapinController extends Controller
{
    public function index()
    {
        return view('contents.integration.app.rekapin.index');
    }

    public function getData(Request $request)
    {
        # code...
    }
}
