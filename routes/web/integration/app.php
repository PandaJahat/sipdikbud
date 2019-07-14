<?php

Route::prefix('integration/app')->group(function () {
    Route::namespace('App')->group(function () {
        // Controllers Within The "App\Http\Controllers\Integration\App" Namespace

        Route::prefix('rekapin')->group(function () {
            Route::get('/', 'RekapinController@index')->name('integration.app.rekapin');
            Route::get('/data', 'RekapinController@data')->name('integration.app.rekapin.data');
            Route::get('/sync', 'RekapinController@sync')->name('integration.app.rekapin.sync');   
        });
        
        Route::prefix('web-puslitjak')->group(function () {
            Route::get('/', 'WebPuslitjakController@index')->name('integration.app.web-puslitjak'); 
            Route::get('/data', 'WebPuslitjakController@data')->name('integration.app.web-puslitjak.data'); 
            Route::get('/update', 'WebPuslitjakController@update')->name('integration.app.web-puslitjak.update'); 
        });
    });
});