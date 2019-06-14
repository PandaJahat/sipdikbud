<?php

namespace App\Http\Controllers\Collection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

# Models
use App\Models\Collection\Language;
use App\Models\Collection\Category;
use App\Models\Collection\Author;
use App\Models\Collection\Collection;

class CreateController extends Controller
{
    public function index()
    {
        return view('contents.collection.create.index');
    }

    public function create(Request $request)
    {
        $collection = new Collection($request->all());
        
        if ($request->hasFile('cover')) {
            $cover_file = $request->file('cover');
    
            $extension = $cover_file->getClientOriginalExtension();
            $cover_filename = strtotime('now').'_'.Str::slug($request->title, '_').'.'.$extension;
            
            $cover_file->move(public_path('covers'), $cover_filename);
            $collection->cover_file = $cover_filename;            
        }

        if ($request->hasFile('document')) {
            $document_file = $request->file('document');
    
            $extension = $document_file->getClientOriginalExtension();
            $document_filename = strtotime('now').'_'.Str::slug($request->title, '_').'.'.$extension;
            
            $document_file->move(storage_path('files/collections'), $document_filename);  
            $collection->document_file = $document_filename;
        }

        $author = Author::where('name', $request->author)->first();
        if (empty($author)) {
            $author = new Author([
                'name' => $request->author
            ]);
            $author->save();

            $collection->author_id = $author->id;
        } else {
            $collection->author_id = $author->id;
        }

        $collection->save();

        $collection->categories()->attach($request->categories);

        foreach (explode(',', $request->keywords) as $keyword) {
            $collection->keywords()->create([
                'keyword' => $keyword
            ]);
        }

        return redirect()->route('collection.list')->with('success', 'Berhasil mengupload penelitian');
    }

    public function getLanguages()
    {
        return Language::orderBy('name')->get();
    }

    public function getCategories()
    {
        return Category::orderBy('name')->get();
    }

    public function getAuthors()
    {
        return Author::get()->pluck('name');
    }
}
