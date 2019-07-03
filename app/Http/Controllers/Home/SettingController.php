<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function about()
    {
        return view('contents.home.setting.about');
    }

    public function saveAbout(Request $request)
    {
        option(['about' => $request->about]);

        return redirect()->route('home.setting.about')->with('success', 'Konten halaman tentang berhasil disimpan!');
    }
}
