<?php

Route::prefix('reference/topic')->group(function () {
    Route::get('/', 'TopicController@index')->name('reference.topic');
    Route::get('/data', 'TopicController@data')->name('reference.topic.data');
});