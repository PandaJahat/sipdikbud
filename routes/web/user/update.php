<?php

Route::prefix('user/update')->group(function () {
    Route::get('/', 'UpdateController@index')->name('user.update');
    Route::patch('/', 'UpdateController@update')->name('user.update.submit');
});