<?php

Route::prefix('collection/detail')->group(function () {
    Route::get('/', 'DetailController@index')->name('collection.detail');
});