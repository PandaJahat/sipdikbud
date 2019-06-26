<?php

Route::prefix('partner/list')->group(function () {
    Route::get('/', 'ListController@index')->name('partner.list');
    Route::get('/data', 'ListController@data')->name('partner.list.data');
});