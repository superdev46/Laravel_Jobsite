<?php
Route::prefix('charity')->name('charity.')->group(function () {
    Route::get('/', 'Charity\Auth\LoginController@showLoginForm');
    Route::get('/login', 'Charity\Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Charity\Auth\LoginController@login');
    Route::post('/logout', 'Charity\Auth\LoginController@logout')->name('logout');
	
	// Registration Routes...
    Route::post('/register', 'Charity\Auth\RegisterController@register')->name('register');
    Route::post('/register', 'Charity\Auth\RegisterController@register');

    Route::get('/password/reset', 'Charity\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email', 'Charity\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset/{token}', 'Charity\Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset', 'Charity\Auth\ResetPasswordController@reset');
});