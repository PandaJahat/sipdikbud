<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

# Models
use App\Models\Area\Province;
use App\Models\Area\District;
use App\Models\Area\Subdistrict;
use App\Models\Area\Village;
use App\Models\User\Gender;
use App\Models\User\User_profile;
use App\User;
use App\Role;

class CreateController extends Controller
{
    public function index()
    {
        return view('contents.user.create.index', [
            'genders' => $this->getGenders()
        ]);
    }

    public function create(Request $request)
    {
        try {
            if (User::where('email', $request->email)->count()) return redirect()->back()->withErrors([
                'email' => 'Email sudah digunakan!'
            ])->withInput();

            if ($request->password != $request->password_confirm) return redirect()->back()->withErrors([
                'password' => 'Password dan Password (ulangi) harus sama!'
            ])->withInput(); 
        } catch (\Exception $e) {
            return redirect()->route('user.create')->withErrors([
                'validation' => 'Terjadi kesalahan saat validasi!'
            ]);
        }

        try {
            $user = new User($request->all());
            $user->password = Hash::make($request->password);
            $user->save();

            $user->attachRole($request->role_id);
            
            $profile = new User_profile($request->all());
            $profile->date_of_birth = Carbon::createFromFormat('d/m/Y', $request->date_of_birth)->format('Y-m-d');
            $profile->fullname = $user->name;
            $profile->user_id = $user->id;
            $profile->save();

            return redirect()->route('user.list')->with('success', 'Pengguna berhasil dibuat!');
        } catch (\Exception $e) {
            return redirect()->route('user.create')->withErrors([
                'save' => 'Terjadi kesalahan saat membuat pengguna!'
            ]);
        }
    }

    public function getProvinces()
    {
        return Province::select(DB::raw('id, name'))->get();
    }

    public function getDistrict(Request $request)
    {
        return District::select(DB::raw('id, name'))->where('province_id', $request->province_id)->get();
    }

    public function getSubdistricts(Request $request)
    {
        return Subdistrict::select(DB::raw('id, name'))->where('district_id', $request->district_id)->get();
    }

    public function getVillages(Request $request)
    {
        return Village::select(DB::raw('id, name'))->where('subdistrict_id', $request->subdistrict_id)->get();
    }

    public function getGenders()
    {
        return Gender::all();
    }

    public function getRoles()
    {
        return Role::all();
    }
}
