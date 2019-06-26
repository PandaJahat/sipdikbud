<?php

Route::prefix('home/search')->group(function () {
    Route::get('/results', 'SearchController@results')->name('home.search.results');
});