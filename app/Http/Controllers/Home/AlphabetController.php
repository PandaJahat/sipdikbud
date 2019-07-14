<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

# Models
use App\Models\Collection\Collection;

class AlphabetController extends Controller
{
    public function index(Request $request)
    {
        try {
            $collections = Collection::where('title', 'LIKE', Crypt::decrypt($request->char).'%')->where('is_active', true)->orderBy('title')->paginate(10);

            return view('contents.home.alphabet.index', [
                'collections' => $collections,
                'char' => Crypt::decrypt($request->char)
            ]);
        } catch (\Exception $e) {
            return redirect()->route('home');
        }
    }
}
