<?php

Route::prefix('home/detail')->group(function () {
    Route::get('/', 'DetailController@index')->name('home.detail');  
});