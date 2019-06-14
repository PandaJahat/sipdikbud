<?php

Route::prefix('collection/download')->group(function () {
    Route::get('/', 'DownloadController@download')->name('collection.download');
    Route::post('/', 'DownloadController@reason')->name('collection.download.reason.submit');
});