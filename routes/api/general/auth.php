<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'namespace'  => 'Api',
    'middleware' => [
        'auth.token',
        'localization'
    ]
], function () {

    /**
     * General API routes
     */
    Route::group(['namespace' => 'General'], function () {

        /**
         * Auth namespace
         */
        Route::group([
            'namespace' => 'Auth',
            'prefix'    => 'auth'
        ], function () {

            /**
             * Provides user logout
             */
            Route::post('logout', 'AuthController@logout')
                ->name('api.auth.user.logout');

            /**
             * Provides user username uniqueness checking
             */
            Route::post('check/username/unique', 'AuthController@checkUsername')
                ->name('api.auth.user.check.username.unique');
        });
    });
});
