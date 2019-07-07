<?php

Route::prefix('reference/request')->group(function () {
    Route::get('/', 'RequestController@index')->name('reference.request');
    Route::get('/data', 'RequestController@data')->name('reference.request.data');
});