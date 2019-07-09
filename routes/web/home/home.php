<?php

Route::prefix('home')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');  

    Route::get('/category', 'HomeController@category')->name('home.category');  
});