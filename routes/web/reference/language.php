<?php

Route::prefix('reference/language')->group(function () {
    Route::get('/', 'LanguageController@index')->name('reference.language');
    Route::get('/data', 'LanguageController@data')->name('reference.language.data');
    Route::get('/update', 'LanguageController@updateForm')->name('reference.language.update.form');

    Route::post('/create', 'LanguageController@create')->name('reference.language.create.submit');
    Route::patch('/update', 'LanguageController@update')->name('reference.language.update.submit');
    Route::delete('/delete', 'LanguageController@delete')->name('reference.language.delete.submit');
});