<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Sarfraznawaz2005\VisitLog\Facades\VisitLog;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        setlocale(LC_ALL, 'id_ID.utf8');
        
        VisitLog::save();
    }
}
