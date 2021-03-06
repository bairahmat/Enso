<?php

Route::get('/getMeta', function () {
    return ['appName' => config('app.name')];
})->name('getMeta');

Route::namespace('Auth')
    ->group(function () {
        Route::post('login', 'LoginController@login')
            ->name('login');
        Route::post('logout', 'LoginController@logout')
            ->name('logout');
        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')
            ->name('password.email');
        Route::post('password/reset', 'ResetPasswordController@reset')
            ->name('password.reset');
    });

Route::middleware(['auth'])
    ->prefix('dashboard')->as('dashboard.')
    ->group(function () {
        Route::get('', 'DashboardController@index')
            ->name('index')
            ->middleware('core');
        Route::get('getLineChartData', 'DashboardController@getLineChartData')
            ->name('getLineChartData');
        Route::get('getBarChartData', 'DashboardController@getBarChartData')
            ->name('getBarChartData');
        Route::get('getPieChartData', 'DashboardController@getPieChartData')
            ->name('getPieChartData');
        Route::get('getDoughnutChartData', 'DashboardController@getDoughnutChartData')
            ->name('getDoughnutChartData');
        Route::get('getRadarChartData', 'DashboardController@getRadarChartData')
            ->name('getRadarChartData');
        Route::get('getPolarChartData', 'DashboardController@getPolarChartData')
            ->name('getPolarChartData');
        Route::get('getBubbleChartData', 'DashboardController@getBubbleChartData')
            ->name('getBubbleChartData');
    });
