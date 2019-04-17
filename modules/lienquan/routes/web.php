<?php

/*
|--------------------------------------------------------------------------
| Routes Lienquan
|--------------------------------------------------------------------------
|
*/

Route::group(['namespace' => 'Zent\Lienquan\Http\Controllers', 'middleware' => ['locale', 'activity']], function () {

    /**
     * Group route admin.
     */
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('lienquan', 'LienquanController');

        Route::prefix('lienquan')->group(function () {
            Route::post('get_list_lienquan', 'LienquanController@getListLienquan')->name('lienquan.getListLienquan');
        });
    });

    /**
     * Group route customer.
     */
    Route::group(['prefix' => 'home'], function () {
        Route::get('lienquan', 'LienquanController@home')->name('lienquan.home');
    });

});



