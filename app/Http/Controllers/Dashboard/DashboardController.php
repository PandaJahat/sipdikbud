<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Sarfraznawaz2005\VisitLog\Models\VisitLog;

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
        return view('contents.dashboard.administrator', [
            'data' => [
                'collectionts_count' => Collection::where('is_active', true)->count(),
                'downloads_count' => Collection_download::count(),
                'visits_count' => VisitLog::count(),
                'collectionts_downloaded_count' => Collection::has('downloads')->count()
            ]
        ]);
    }

    public function public()
    {
        return view('contents.dashboard.administrator');
    }

    public function researcher(Type $var = null)
    {
        return view('contents.dashboard.administrator');
    }

    public function reviewer(Type $var = null)
    {
        # code...
    }
}
