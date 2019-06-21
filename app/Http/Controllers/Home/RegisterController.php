<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

# Models
use App\User;
use App\Models\User\User_profile;

class RegisterController extends Controller
{
    public function index()
    {
        return view('contents.home.register.index', [
            'genders' => app(\App\Http\Controllers\User\CreateController::class)->getGenders()
        ]);
    }

    public function create(Request $request)
    {
        try {
            if (User::where('email', $request->email)->count()) return redirect()->back()->withErrors([
                'email' => 'Email sudah digunakan!'
            ])->withInput();

            if ($request->password != $request->password_confirm) return redirect()->back()->withErrors([
                'password' => 'Kata Sandi dan Kata Sandi (ulangi) harus sama!'
            ])->withInput(); 
        } catch (\Exception $e) {
            return redirect()->route('home.register')->withErrors([
                'validation' => $e->getMessage()
            ]);
        }

        try {
            $user = new User($request->all());
            $user->password = Hash::make($request->password);
            $user->save();

            $user->attachRole('public');

            $profile = new User_profile($request->all());
            $profile->fullname = $user->name;
            $profile->user_id = $user->id;
            $profile->save();

            return redirect()->route('login');

        } catch (\Exception $e) {
            return redirect()->route('home.register')->withErrors([
                'validation' => $e->getMessage()
            ]);
        }
    }
}
