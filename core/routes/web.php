<?php

/*
|--------------------------------------------------------------------------
| Routes {Core}
|--------------------------------------------------------------------------
|
*/

Route::group(['namespace' => 'Zent\{Core}\Http\Controllers'], function () {

    /**
     * Group route admin.
     *
     * @return here
     * @author ThanhTung
     */
    Route::prefix('admin')->group(function () {
        Route::get('{core_snake_case}', '{Core}Controller@index')->name('{core}.index');
    });

    /**
     * Group route customer.
     *
     * @return here
     * @author ThanhTung
     */
    Route::prefix('home')->group(function () {
        Route::get('{core_snake_case}', '{Core}Controller@home')->name('{core}.home');
    });
});



