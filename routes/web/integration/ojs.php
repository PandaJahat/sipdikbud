<?php

Route::prefix('integration/ojs')->group(function () {
    Route::get('/', 'OpenJournalSystemController@index')->name('integration.ojs');
});