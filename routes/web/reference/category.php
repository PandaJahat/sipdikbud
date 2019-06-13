<?php

Route::prefix('reference/category')->group(function () {
    Route::get('/', 'CategoryController@index')->name('reference.category');
    Route::get('/data', 'CategoryController@data')->name('reference.category.data');
    Route::get('/update', 'CategoryController@updateForm')->name('reference.category.update.form');

    Route::post('/create', 'CategoryController@create')->name('reference.category.create.submit');
    Route::patch('/update', 'CategoryController@update')->name('reference.category.update.submit');
    Route::delete('/delete', 'CategoryController@delete')->name('reference.category.delete.submit');
});