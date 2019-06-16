<?php

Route::prefix('integration/other')->group(function () {
    Route::get('/', 'OtherAppController@index')->name('integration.other');
});