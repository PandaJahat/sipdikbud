<?php

Route::prefix('collection/list')->group(function () {
    Route::get('/', 'ListController@index')->name('collection.list');
    Route::get('/data', 'ListController@data')->name('collection.list.data');
    Route::get('/download/form', 'ListController@downloadForm')->name('collection.list.download.form');

    Route::delete('/delete', 'ListController@delete')->name('collection.list.delete.submit');
});