<?php

Route::prefix('article/create')->group(function () {
    Route::get('/', 'CreateController@index')->name('article.create');
    Route::get('/get/categories', 'CreateController@getCategories')->name('article.create.get.categories');

    Route::post('/', 'CreateController@create')->name('article.create.submit');
});