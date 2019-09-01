<?php

Route::prefix('article/update')->group(function () {
    Route::get('/', 'UpdateController@index')->name('article.update');

    Route::post('/', 'UpdateController@update')->name('article.update.submit');
});