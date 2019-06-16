<?php

Route::prefix('reference/institution')->group(function () {
    Route::get('/', 'InstitutionController@index')->name('reference.institution');
    Route::get('/data', 'InstitutionController@data')->name('reference.institution.data');
    Route::get('/update', 'InstitutionController@updateForm')->name('reference.institution.update.form');

    Route::post('/create', 'InstitutionController@create')->name('reference.institution.create.submit');
    Route::patch('/update', 'InstitutionController@update')->name('reference.institution.update.submit');
    Route::delete('/delete', 'InstitutionController@delete')->name('reference.institution.delete.submit');
});