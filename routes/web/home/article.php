<?php

Route::prefix('home/article')->group(function () {
    Route::get('/list', 'ArticleController@index')->name('home.article.list');  
});