<?php

Route::prefix('reference/reason')->group(function () {
    Route::get('/', 'ReasonController@index')->name('reference.reason');
    Route::get('/data', 'ReasonController@data')->name('reference.reason.data');
    Route::get('/update', 'ReasonController@updateForm')->name('reference.reason.update.form');

    Route::post('/create', 'ReasonController@create')->name('reference.reason.create.submit');
    Route::patch('/update', 'ReasonController@update')->name('reference.reason.update.submit');
    Route::delete('/delete', 'ReasonController@delete')->name('reference.reason.delete.submit');
});