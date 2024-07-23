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
        'auth.apikey',
        'localization'
    ]
], function () {

    /**
     * Guest API routes
     */
    Route::group(['namespace' => 'Guest'], function () {

        /**
         * Auth namespace
         */
        Route::group([
            'namespace' => 'Auth',
            'prefix'    => 'auth'
        ], function () {

            /**
             * Admin area
             */
            Route::group(['prefix' => 'admins'], function () {

                /**
                 * Provides admin registering
                 */
                Route::post('register', 'AdminController@register')
                    ->name('api.auth.admin.register');

                /**
                 * Provides admin authorization
                 */
                Route::post('login', 'AdminController@login')
                    ->name('api.auth.admin.login');

                /**
                 * Provides admin authorization
                 */
                Route::post('retrieve', 'AdminController@retrieve')
                    ->name('api.auth.admin.retrieve');

                /**
                 * Provides admin authorization
                 */
                Route::patch('email', 'AdminController@updateEmail')
                    ->name('api.auth.admin.email');
            });

            /**
             * User area
             */
            Route::group(['prefix' => 'users'], function () {

                /**
                 * Provides user registering
                 */
                Route::post('register', 'UserController@register')
                    ->name('api.auth.user.register');

                /**
                 * Provides user authorization
                 */
                Route::post('login', 'UserController@login')
                    ->name('api.auth.user.login');
            });

            /**
             * Provides user token checking
             */
            Route::get('check/token', 'AuthController@checkToken')
                ->name('api.auth.check.token');

            /**
             * Provides user username checking
             */
            Route::post('check/username', 'AuthController@checkUsername')
                ->name('api.auth.check.username');

            /**
             * Provides user email checking
             */
            Route::post('check/email', 'AuthController@checkEmail')
                ->name('api.auth.check.email');

            /**
             * Provides api access test
             */
            Route::get('test', 'AuthController@test')
                ->name('api.auth.test');
        });
    });
});
