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
     */
    Route::prefix('admin')->group(function () {
        Route::get('{core_snake_case}', '{Core}Controller@index')->name('{core}.index');
    });

    /**
     * Group route customer.
     */
    Route::prefix('home')->group(function () {
        Route::get('{core_snake_case}', '{Core}Controller@home')->name('{core}.home');
    });
});



