<?php

Route::prefix('integration/other')->group(function () {
    Route::get('/', 'OtherAppController@index')->name('integration.other');
    Route::get('/data', 'OtherAppController@data')->name('integration.other.data');
});