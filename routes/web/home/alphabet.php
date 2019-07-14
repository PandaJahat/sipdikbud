<?php

Route::prefix('home/alphabet')->group(function () {
    Route::get('/', 'AlphabetController@index')->name('home.alphabet');  
});