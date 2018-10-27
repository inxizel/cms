<?php

/*
|--------------------------------------------------------------------------
| Routes User
|--------------------------------------------------------------------------
|
*/

Route::group(['namespace' => 'Zent\User\Http\Controllers', 'middleware' => ['locale', 'activity']], function () {

    /**
     * Group route admin.
     */
    Route::prefix('admin')->group(function () {
        Route::resource('user', 'UserController');
        Route::get('login', 'LoginController@showLoginForm')->name('user.showLoginForm');
        Route::post('login', 'LoginController@login')->name('user.login');
        Route::get('logout', 'LoginController@logout')->name('user.logout');

        Route::prefix('user')->group(function () {
            Route::post('get-list-user', 'UserController@getListUser')->name('user.getListUser');
            Route::post('check-unique-email', 'UserController@checkUniqueEmail')->name('user.checkUniqueEmail');
            Route::get('role/{user}', 'UserController@roleUser')->name('user.roleUser');
            Route::post('get-list-role-user', 'UserController@getListRoleUser')->name('user.getListRoleUser');
            Route::post('update-role-user', 'UserController@updateRoleUser')->name('user.updateRoleUser');
            Route::post('profile', 'UserController@profile')->name('user.profile');
        });
    });

    /**
     * Group route customer.
     */
    Route::prefix('home')->group(function () {
        Route::get('user', 'UserController@home')->name('user.home');
    });
});



