<?php

Route::prefix('collection/update')->group(function () {
    Route::get('/', 'UpdateController@index')->name('collection.update');
    Route::patch('/', 'UpdateController@update')->name('collection.update.submit');
});