<?php

namespace App\Http\Controllers\Collection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use function GuzzleHttp\json_decode;

# Models
use App\Models\Collection\Collection;
use App\Models\Collection\Author;

class UpdateController extends Controller
{
    public function index(Request $request)
    {
        $collection = Collection::find($request->id)->load([
            'author', 'language', 'keywords', 'categories'
        ]);
        $keywords = implode(',', json_decode($collection->keywords->pluck('keyword')));
        $categories = $collection->categories->pluck('id');

        return view('contents.collection.update.index', [
            'collection' => $collection,
            'keywords' => $keywords,
            'categories' => $categories
        ]);
    }

    public function update(Request $request)
    {
        $collection = Collection::find($request->id);
        $collection->fill($request->all());

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

        $collection->categories()->detach();
        $collection->categories()->attach($request->categories);

        $collection->keywords()->delete();
        foreach (explode(',', $request->keywords) as $keyword) {
            $collection->keywords()->create([
                'keyword' => $keyword
            ]);
        }

        return redirect()->route('collection.list')->with('success', 'Berhasil mengubah penelitian!');
    }
}
