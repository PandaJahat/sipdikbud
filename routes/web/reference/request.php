<?php

Route::prefix('reference/request')->group(function () {
    Route::get('/', 'RequestController@index')->name('reference.request');
    Route::get('/data', 'RequestController@data')->name('reference.request.data');

    Route::post('/create', 'RequestController@create')->name('reference.request.create.submit');
    Route::delete('/delete', 'RequestController@delete')->name('reference.request.delete.submit');
});