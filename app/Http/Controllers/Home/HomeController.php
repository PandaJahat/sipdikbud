<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

# Models
use App\Models\Collection\Category;

class HomeController extends Controller
{
    public function index()
    {
        return view('contents.home.home.index', [
            'categories' => $this->getCategories()
        ]);
    }

    public function getCategories()
    {
        return Category::orderBy('name', 'asc')->get();
    }
}
