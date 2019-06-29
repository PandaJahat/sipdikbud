<?php

namespace App\Http\Controllers\Integration\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

# Models
use App\Models\Integration\Rekapin\Collection;

# Jobs
use App\Jobs\Integration\Rekapin\SyncCollection;

class RekapinController extends Controller
{
    public function index()
    {
        return view('contents.integration.app.rekapin.index');
    }

    public function sync()
    {
        SyncCollection::dispatch(Auth::user()->id);
        return 'done';
    }
}
