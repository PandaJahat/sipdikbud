<?php

Route::prefix('collection/create')->group(function () {
    Route::get('/', 'CreateController@index')->name('collection.create');
});