<?php

Route::prefix('collection/search')->group(function () {
    Route::get('/', 'SearchController@index')->name('collection.search');
    
});