<?php

Route::prefix('collection/mapping')->group(function () {
    Route::get('/', 'MappingController@index')->name('collection.mapping');
    Route::get('/data', 'MappingController@data')->name('collection.mapping.data');

    Route::get('/detail', 'MappingController@detail')->name('collection.mapping.detail');
    Route::get('/get/institutions', 'MappingController@getInstitutions')->name('collection.mapping.get.institutions');
    Route::get('/get/collections', 'MappingController@getCollections')->name('collection.mapping.get.collections');

    Route::post('/', 'MappingController@save')->name('collection.mapping.submit');
    
    Route::get('/reviewer/data', 'MappingController@dataReviewer')->name('collection.mapping.reviewer.data');
    Route::post('/reviewer/save', 'MappingController@saveReviewer')->name('collection.mapping.reviewer.submit');
});