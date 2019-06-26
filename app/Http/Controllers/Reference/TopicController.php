<?php

namespace App\Http\Controllers\Reference;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;

# Models
use App\Models\Collection\Topic;

class TopicController extends Controller
{
    public function index()
    {
        return view('contents.reference.topic.index');
    }

    public function data(Request $request)
    {
        $topics = Topic::select(DB::raw('topics.*'))->withCount([
            'collections'
        ]);
        
        return DataTables::of($topics)
        ->addIndexColumn()
        ->editColumn('created_at', function($topic) {
            return Carbon::parse($topic->created_at)->format('d/m/Y');
        })
        ->addColumn('actions', function($topic) {
            if ($topic->collections()->exists()) return '';

            return '<a href="javascript:;" class="uk-badge uk-badge-warning" onclick="updateTopic('.$topic->id.')">Ubah</a>'.'&nbsp;&nbsp;'.'<a href="javascript:;" class="uk-badge uk-badge-danger" onclick="deleteTopic('.$topic->id.')">Hapus</a>';
        })
        ->rawColumns([
            'actions'
        ])
        ->make(true);
    }
}
