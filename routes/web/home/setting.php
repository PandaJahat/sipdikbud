<?php

Route::prefix('home/setting')->group(function () {
    Route::get('/about', 'SettingController@about')->name('home.setting.about');  
    Route::post('/about', 'SettingController@saveAbout')->name('home.setting.about.submit');  

    Route::get('/slider', 'SettingController@slider')->name('home.setting.slider');  
    Route::get('/slider/data', 'SettingController@dataSlider')->name('home.setting.slider.data');  
    Route::post('/slider', 'SettingController@createSlider')->name('home.setting.slider.create.submit');  
    Route::delete('/slider', 'SettingController@deleteSlider')->name('home.setting.slider.delete.submit');  
});