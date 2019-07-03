<?php

Route::prefix('home/setting')->group(function () {
    Route::get('/about', 'SettingController@about')->name('home.setting.about');  
    Route::post('/about', 'SettingController@saveAbout')->name('home.setting.about.submit');  
});