<?php

Route::prefix('home')->group(function () {
    // Route::get('/', 'HomeController@index')->name('home');
    Route::get('/', function () {
        return redirect()->route('login');
    })->name('home');
});