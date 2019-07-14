<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Sarfraznawaz2005\VisitLog\Models\VisitLog;
use Illuminate\Support\Facades\DB;

# Models
use App\Models\Collection\Collection;
use App\Models\Download\Collection as Collection_download;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return redirect()->route('dashboard.'.$user->roles->last()->name);
    }

    public function administrator()
    {
        $top_collections = Collection::has('visits')->withCount([
            'visits' => function($query) {
                $query->where('previous_url', 'not like', '%/detail?%');
            }
        ])->orderBy('visits_count', 'desc')->limit(5)->get();

        return view('contents.dashboard.administrator', [
            'data' => [
                'collectionts_count' => Collection::where('is_active', true)->count(),
                'downloads_count' => Collection_download::count(),
                'visits_count' => VisitLog::count(),
                'collectionts_downloaded_count' => Collection::has('downloads')->count()
            ],
            'top_collections' => $top_collections
        ]);
    }

    public function public()
    {
        return view('contents.dashboard.index');
    }

    public function researcher()
    {
        return view('contents.dashboard.index');
    }

    public function reviewer()
    {
        return view('contents.dashboard.index');
    }

    public function adminChartData()
    {
        $collection_category = DB::selecT($this->queryCollectionCategory());
        $visit_log = DB::selecT($this->queryVisitLog());

        return [
            'collection_category' => $collection_category,
            'visit_log' => $visit_log
        ];
    }

    private function queryCollectionCategory()
    {
        return "SELECT
                    categories.name as label, 
                    count(*) as value
                FROM
                    (
                        SELECT
                            *
                        FROM
                            collection_category
                        GROUP BY
                            collection_id
                    ) AS category_collection
                JOIN collections ON collections.id = category_collection.collection_id
                JOIN categories ON categories.id = category_collection.category_id
                GROUP BY
                    categories. NAME";
    }
    
    private function queryVisitLog()
    {
        return "SELECT
                    date_format(created_at, '%Y-%m-%d') AS date,
                    count(*) AS value
                FROM
                    visitlogs
                GROUP BY
                    date_format(created_at, '%Y-%m-%d')";
    }
}
