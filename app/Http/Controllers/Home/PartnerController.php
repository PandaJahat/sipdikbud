<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnerController extends Controller
{
    public function institute()
    {
        return view('contents.home.partner.institute');
    }
}
