<?php

/*
|--------------------------------------------------------------------------
| Routes User
|--------------------------------------------------------------------------
|
*/

Route::group(['namespace' => 'Zent\User\Http\Controllers', 'middleware' => ['locale']], function () {

    /**
     * Group route admin.
     */
    Route::prefix('admin')->group(function () {
        Route::resource('user', 'UserController');
        Route::get('login', 'LoginController@showLoginForm')->name('user.showLoginForm');
        Route::post('login', 'LoginController@login')->name('user.login');
        Route::get('logout', 'LoginController@logout')->name('user.logout');
        Route::post('/user/get-list-user', 'UserController@getListUser')->name('user.getListUser');
        Route::post('/user/check-unique-email', 'UserController@checkUniqueEmail')->name('user.checkUniqueEmail');
        Route::get('/user/role/{user}', 'UserController@roleUser')->name('user.roleUser');
        Route::post('/user/get-list-role-user', 'UserController@getListRoleUser')->name('user.getListRoleUser');
        Route::post('/user/update-role-user', 'UserController@updateRoleUser')->name('user.updateRoleUser');

    });

    /**
     * Group route customer.
     */
    Route::prefix('home')->group(function () {
        Route::get('user', 'UserController@home')->name('user.home');
    });
});



