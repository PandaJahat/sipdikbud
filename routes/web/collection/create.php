<?php

Route::prefix('collection/create')->group(function () {
    Route::get('/', 'CreateController@index')->name('collection.create');
    Route::post('/', 'CreateController@create')->name('collection.create.submit');

    Route::get('/get/languages', 'CreateController@getLanguages')->name('collection.create.get.languages');
    Route::get('/get/categories', 'CreateController@getCategories')->name('collection.create.get.categories');
    Route::get('/get/authors', 'CreateController@getAuthors')->name('collection.create.get.authors');
});