<?php

Route::prefix('collection/download')->group(function () {
    Route::get('/document', 'DownloadController@download')->name('collection.download');
    Route::get('/abstract', 'DownloadController@abstract')->name('collection.download.abstract');
    Route::get('/get/reasons', 'DownloadController@getReasons')->name('collection.download.get.reasons');

    Route::post('/', 'DownloadController@reason')->name('collection.download.reason.submit');
});