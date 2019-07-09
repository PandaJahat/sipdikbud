<?php

Route::prefix('home')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');  
    Route::get('/category', 'HomeController@category')->name('home.category');  
    Route::get('/alphabet', 'HomeController@alphabet')->name('home.alphabet');  
});