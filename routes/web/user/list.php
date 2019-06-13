<?php

Route::prefix('user/list')->group(function () {
    Route::get('/', 'ListController@index')->name('user.list');
    Route::get('/data', 'ListController@data')->name('user.list.data');

    Route::delete('/delete', 'ListController@delete')->name('user.list.delete.submit');
});