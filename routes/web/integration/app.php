<?php

Route::prefix('integration/app')->group(function () {
    Route::namespace('App')->group(function () {
        // Controllers Within The "App\Http\Controllers\Integration\App" Namespace

        Route::prefix('rekapin')->group(function () {
            Route::get('/', 'RekapinController@index')->name('integration.app.rekapin');
            Route::get('/sync', 'RekapinController@sync')->name('integration.app.rekapin.sync');   
        });
    });
});