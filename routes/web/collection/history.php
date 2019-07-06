<?php

Route::prefix('collection/history')->group(function () {
    Route::get('/', 'HistoryController@index')->name('collection.history');  
    Route::get('/data', 'HistoryController@data')->name('collection.history.data');  
});