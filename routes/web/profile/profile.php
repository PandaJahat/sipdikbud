<?php

Route::prefix('profile')->group(function () {
    Route::get('/', 'ProfileController@index')->name('profile');  
});