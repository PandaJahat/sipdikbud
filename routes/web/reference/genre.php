<?php

Route::prefix('reference/genre')->group(function () {
    Route::get('/', 'GenreController@index')->name('reference.genre');
    Route::get('/data', 'GenreController@data')->name('reference.genre.data');
    Route::get('/update', 'GenreController@updateForm')->name('reference.genre.update.form');

    Route::post('/create', 'GenreController@create')->name('reference.genre.create.submit');
    Route::patch('/update', 'GenreController@update')->name('reference.genre.update.submit');
    Route::delete('/delete', 'GenreController@delete')->name('reference.genre.delete.submit');
});