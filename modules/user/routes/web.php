<?php

/*
|--------------------------------------------------------------------------
| Routes User
|--------------------------------------------------------------------------
|
*/

Route::group(['namespace' => 'Zent\User\Http\Controllers'], function () {

    /**
     * Group route admin.
     */
    Route::prefix('admin')->group(function () {
        Route::get('login', 'LoginController@showLoginForm')->name('user.showLoginForm');
        Route::post('login', 'LoginController@login')->name('user.login');
        Route::get('logout', 'LoginController@logout')->name('user.logout');
    });

    /**
     * Group route customer.
     */
    Route::prefix('home')->group(function () {
        Route::get('user', 'UserController@home')->name('user.home');
    });
});



