<?php

Route::prefix('article/category')->group(function () {
    Route::get('/', 'CategoryController@index')->name('article.category');
    Route::get('/data', 'CategoryController@data')->name('article.category.data');
});