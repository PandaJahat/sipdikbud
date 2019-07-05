<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        setlocale(LC_ALL, 'id_ID.utf8');

        return view('contents.profile.profile.index', [
            'user' => Auth::user()->load(['profile.gender', 'profile.province', 'profile.district', 'profile.subdistrict', 'profile.village'])
        ]);
    }
}
