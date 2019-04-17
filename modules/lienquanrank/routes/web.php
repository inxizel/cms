<?php

/*
|--------------------------------------------------------------------------
| Routes Lienquanrank
|--------------------------------------------------------------------------
|
*/

Route::group(['namespace' => 'Zent\Lienquanrank\Http\Controllers', 'middleware' => ['locale', 'activity']], function () {

    /**
     * Group route admin.
     */
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('lienquanrank', 'LienquanrankController');

        Route::prefix('lienquanrank')->group(function () {
            Route::post('get_list_lienquanrank', 'LienquanrankController@getListLienquanrank')->name('lienquanrank.getListLienquanrank');
        });
    });

    /**
     * Group route customer.
     */
    Route::group(['prefix' => 'home'], function () {
        Route::get('lienquanrank', 'LienquanrankController@home')->name('lienquanrank.home');
    });

});



