<?php

Route::prefix('home')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/search/results', 'HomeController@results')->name('home.temp.results');
});