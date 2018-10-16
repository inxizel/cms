<?php

/*
|--------------------------------------------------------------------------
| Routes Module
|--------------------------------------------------------------------------
|
*/

Route::group(['namespace' => 'Zent\Module\Http\Controllers', 'middleware' => ['locale']], function () {

    /**
     * Group route admin.
     */
    Route::prefix('admin')->group(function () {
        Route::resource('module', 'ModuleController');
    });

    /**
     * Group route customer.
     */
    Route::prefix('home')->group(function () {
        Route::get('module', 'ModuleController@home')->name('module.home');
    });
});



