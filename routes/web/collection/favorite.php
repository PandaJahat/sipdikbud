<?php

Route::prefix('collection/favorite')->group(function () {
    Route::get('/', 'FavoriteController@index')->name('collection.favorite');  
    Route::get('/data', 'FavoriteController@data')->name('collection.favorite.data');  
});