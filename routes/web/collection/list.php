<?php

Route::prefix('collection/list')->group(function () {
    Route::get('/', 'ListController@index')->name('collection.list');
    Route::get('/data', 'ListController@data')->name('collection.list.data');
});