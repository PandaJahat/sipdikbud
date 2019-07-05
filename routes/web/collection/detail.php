<?php

Route::prefix('collection/detail')->group(function () {
    Route::get('/', 'DetailController@index')->name('collection.detail');
    
    Route::post('/add/favorite', 'DetailController@addFavorite')->name('collection.detail.add.favorite.submit');
    Route::post('/add/comment', 'DetailController@addComment')->name('collection.detail.add.comment.submit');
});