<?php

Route::prefix('home/register')->group(function () {
    Route::get('/', 'RegisterController@index')->name('home.register');
    Route::post('/', 'RegisterController@create')->name('home.register.create.submit');
});