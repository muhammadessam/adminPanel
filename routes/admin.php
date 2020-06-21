<?php

use Illuminate\Support\Facades\Route;


Route::get('lang/{locale}', 'LocalizationController@index')->name('changeLang');
Route::prefix('admin')->group(function () {

    Route::namespace('Auth')->middleware('guest:admin')->group(function () {

        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        Route::post('/login', 'LoginController@login');

        //Forgot Password Routes
        Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');

        //Reset Password Routes
        Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset', 'ResetPasswordController@reset')->name('password.update');

    });
    Route::namespace('Auth')->middleware('auth:admin')->group(function () {
        Route::post('/logout', 'LoginController@logout')->name('logout');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('home', 'HomeController@index')->name('home');

        Route::resource('settings', 'SettingsController')->except('create', 'edit', 'destroy', 'show', 'store');
    });
});