<?php

/*
|--------------------------------------------------------------------------
| Routes {Core}
|--------------------------------------------------------------------------
|
*/

Route::group(['namespace' => 'Zent\{Core}\Http\Controllers', 'middleware' => ['locale']], function () {

    /**
     * Group route admin.
     */
    Route::group(['perfix' => 'admin'], function () {
        Route::get('{core_snake_case}', '{Core}Controller@index')->name('{core}.index');
    });

    /**
     * Group route customer.
     */
    Route::group(['perfix' => 'home'], function () {
        Route::get('{core_snake_case}', '{Core}Controller@home')->name('{core}.home');
    });

});



