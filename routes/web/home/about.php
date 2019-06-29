<?php

Route::prefix('home/about')->group(function () {
    Route::get('/', 'AboutController@index')->name('home.about');  
});