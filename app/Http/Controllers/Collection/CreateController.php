<?php

namespace App\Http\Controllers\Collection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

# Models
use App\Models\Collection\Language;
use App\Models\Collection\Category;
use App\Models\Collection\Author;
use App\Models\Collection\Collection;
use App\Models\Collection\Genre;
use App\Models\Collection\Topic;

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

        if ($request->hasFile('abstract')) {
            $abstract_file = $request->file('abstract');
    
            $extension = $abstract_file->getClientOriginalExtension();
            $abstract_filename = strtotime('now').'_'.Str::slug($request->title, '_').'.'.$extension;
            
            $abstract_file->move(storage_path('files/abstracts'), $abstract_filename);  
            $collection->abstract_file = $abstract_filename;
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

        $collection->user_id = Auth::user()->id;
        $collection->save();

        $collection->categories()->attach([$request->category_id]);
        $collection->genres()->attach($request->genres);

        foreach (explode(',', $request->keywords) as $keyword) {
            $collection->keywords()->create([
                'keyword' => $keyword
            ]);
        }

        foreach (explode(',', $request->topics) as $topic) {
            $getTopic = Topic::where('topic', $topic)->first();

            if (empty($getTopic)) {
                $getTopic = new Topic([
                    'topic' => $topic
                ]);
                $getTopic->save(); 
            }

            $collection->topics()->attach([$getTopic->id]);
        }

        return redirect()->route('collection.list')->with('success', 'Berhasil mengupload publikasi!');
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

    public function getGenres()
    {
        return Genre::orderBy('name')->get();
    }
}
