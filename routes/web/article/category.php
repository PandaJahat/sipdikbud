<?php

Route::prefix('article/category')->group(function () {
    Route::get('/', 'CategoryController@index')->name('article.category');
    Route::get('/data', 'CategoryController@data')->name('article.category.data');
    Route::get('/get', 'CategoryController@getCategory')->name('article.category.get');

    Route::post('/create', 'CategoryController@create')->name('article.category.create.submit');
    Route::patch('/update', 'CategoryController@update')->name('article.category.update.submit');
    Route::delete('/delete', 'CategoryController@delete')->name('article.category.delete.submit');
});