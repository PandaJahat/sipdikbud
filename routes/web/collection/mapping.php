<?php

Route::prefix('collection/mapping')->group(function () {
    Route::get('/', 'MappingController@index')->name('collection.mapping');
    Route::get('/data', 'MappingController@data')->name('collection.mapping.data');
});