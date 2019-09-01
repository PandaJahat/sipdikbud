<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

# Models
use App\Models\Article\Article;

class UpdateController extends Controller
{
    public function index(Request $request)
    {
        try {
            $article = Article::find(Crypt::decrypt($request->id));
        } catch (\Exception $e) {
            return redirect()->route('article.list')->with('error', $e->getMessage());
        }
        
        return view('contents.article.update.index', [
            'article' => $article
        ]);
    }

    public function update(Request $request)
    {
        try {
            $article = Article::find(Crypt::decrypt($request->id));
        } catch (\Exception $e) {
            return redirect()->route('article.list')->with('error', $e->getMessage());
        }

        $article->fill($request->all());

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
    
            $extension = $image->getClientOriginalExtension();
            $filename = strtotime('now').'_'.Str::slug($request->title, '_').'.'.$extension;
            
            $image->move(public_path('thumbnails/original'), $filename);  
            $article->thumbnail_file = $filename;
            
            Image::make(public_path('thumbnails/original/').$article->thumbnail_file)->resize(1280, 853)->save(public_path('thumbnails/').$article->thumbnail_file);
        }

        $article->save();

        return redirect()->route('article.list')->with('success', 'Berhasil mengubah artikel!');
    }
}
