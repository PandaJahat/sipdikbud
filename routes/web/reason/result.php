<?php

Route::prefix('reason/result')->group(function () {
    Route::get('/', 'ResultController@index')->name('reason.result');
    Route::get('/data', 'ResultController@data')->name('reason.result.data');
});