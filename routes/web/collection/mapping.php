<?php

Route::prefix('collection/mapping')->group(function () {
    Route::get('/', 'MappingController@index')->name('collection.mapping');
    Route::get('/data', 'MappingController@data')->name('collection.mapping.data');

    Route::get('/detail', 'MappingController@detail')->name('collection.mapping.detail');
    Route::get('/get/institutions', 'MappingController@getInstitutions')->name('collection.mapping.get.institutions');

    Route::post('/', 'MappingController@save')->name('collection.mapping.submit');
});