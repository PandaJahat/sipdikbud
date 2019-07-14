<?php

Route::prefix('test')->group(function () {
    Route::get('/', 'TestController@index')->name('test');
});