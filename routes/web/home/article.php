<?php

Route::prefix('home/article')->group(function () {
    Route::get('/list', 'ArticleController@list')->name('home.article.list');  
    Route::get('/detail', 'ArticleController@detail')->name('home.article.detail');  
});