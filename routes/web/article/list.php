<?php

Route::prefix('article/list')->group(function () {
    Route::get('/', 'ListController@index')->name('article.list');
    Route::get('/data', 'ListController@data')->name('article.list.data');
});