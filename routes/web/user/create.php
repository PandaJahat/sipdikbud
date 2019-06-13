<?php

Route::prefix('user/create')->group(function () {
    Route::get('/', 'CreateController@index')->name('user.create');
    Route::post('/', 'CreateController@create')->name('user.create.submit');

    Route::get('/get/provinces', 'CreateController@getProvinces')->name('user.create.get.provinces');
    Route::get('/get/districts', 'CreateController@getDistricts')->name('user.create.get.districts');
    Route::get('/get/subdistricts', 'CreateController@getSubdistricts')->name('user.create.get.subdistricts');
    Route::get('/get/villages', 'CreateController@getVillages')->name('user.create.get.villages');
    Route::get('/get/roles', 'CreateController@getRoles')->name('user.create.get.roles');
});