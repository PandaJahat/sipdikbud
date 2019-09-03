<?php

Route::prefix('home/article')->group(function () {
    Route::get('/list', 'ArticleController@index')->name('home.article.list');  
    Route::get('/detail', 'ArticleController@detail')->name('home.article.detail');  
});