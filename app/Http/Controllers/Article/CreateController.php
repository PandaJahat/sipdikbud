<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\URL;

# Models
use App\Models\Article\Article;
use App\Models\Article\Category;

class CreateController extends Controller
{
    public function index()
    {
        return view('contents.article.create.index');
    }

    public function create(Request $request)
    {
        $article = new Article($request->all());

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
    
            $extension = $image->getClientOriginalExtension();
            $filename = strtotime('now').'_'.Str::slug($request->title, '_').'.'.$extension;
            
            $image->move(public_path('thumbnails/original'), $filename);  
            $article->thumbnail_file = $filename;
            
            Image::make(URL::to('thumbnails/original/'.$article->thumbnail_file))->resize(200, 200)->save(public_path('thumbnails/original', $article->thumbnail_file));
        }

        $article->save();

        return redirect()->route('article.list')->with('success', 'Berhasil membuat artikel!');
    }

    public function getCategories()
    {
        return Category::orderBy('name')->get();
    }
}
