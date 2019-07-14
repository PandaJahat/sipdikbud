<?php

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/dashboard/administrator', 'DashboardController@administrator')->name('dashboard.admin');
Route::get('/dashboard/administrator/chart/data', 'DashboardController@adminChartData')->name('dashboard.admin.chart.data');

Route::get('/dashboard/public', 'DashboardController@public')->name('dashboard.public');
Route::get('/dashboard/researcher', 'DashboardController@researcher')->name('dashboard.researcher');
Route::get('/dashboard/reviewer', 'DashboardController@reviewer')->name('dashboard.reviewer');