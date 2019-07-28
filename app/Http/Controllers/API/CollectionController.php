<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

# Models
use App\Models\Collection\Collection;

class CollectionController extends Controller
{
    public function get(Request $request)
    {
        $collections = Collection::where('is_active', true)->with([
            'author', 'keywords', 
        ])->get();

        $data = [];

        foreach ($collections as $key => $row) {
            $data[] = [
                'title' => $row->title,
                'authors' => $row->author->name,
                'subjects' => empty($row->subjects) ? '' : $row->subjects,
                'keywords' => $row->keywords()->exists() ? implode(',', json_decode($row->keywords->pluck('keyword'))) : '',
                'description' => empty($row->description) ? '' : $row->description,
                'relations' => '',
                'publisher' => empty($row->published_by) ? '' : $row->published_by,
                'publishDate' => empty($row->published_year) ? '' : $row->published_year
            ];
        }

        return $data;
    }
}
