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
        Route::resource('brenchs', 'BrenchController');
        Route::resource('employees', 'EmployeeController');
        Route::get('humanR', 'HumanResourceController@index')->name('human_r');
        Route::get('StonedAll', 'EmployeeController@stoned')->name('stoned_emps');
        Route::get('ActiveAll', 'EmployeeController@active')->name('active_emps');
        Route::post('byBrench', 'EmployeeController@byBrench')->name('brench_emps');
        Route::get('stoning/{employee}', 'EmployeeController@stoning')->name('stoning');
        Route::get('activating/{employee}', 'EmployeeController@activating')->name('activating');
        Route::resource('bills', 'BillController');
        Route::resource('expenses', 'ExpenseController');
        Route::resource('expenses-categories', 'ExpensesCategoryController');
    });
});
