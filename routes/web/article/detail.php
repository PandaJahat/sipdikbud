<?php

Route::prefix('article/detail')->group(function () {
    Route::get('/', 'DetailController@index')->name('article.detail');
});