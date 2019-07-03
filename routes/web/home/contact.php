<?php

Route::prefix('home/contact')->group(function () {
    Route::get('/', 'ContactController@index')->name('home.contact');  
});