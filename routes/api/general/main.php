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
         * User namespace
         */
        Route::group(['namespace' => 'User'], function () {

            /**
             * Provides user password checking
             */
            Route::post('user/password/check', 'UserController@checkPassword')
                ->name('api.user.password.check');

            /**
             * Provides user account updating by admin
             */
            Route::patch('user/{id}/by/admin', 'UserController@updateByAdmin')
                ->name('api.user.by.admin');

            /**
             * Provides user account email updating
             */
            Route::patch('user/account/email', 'UserController@updateAccountEmail')
                ->name('api.user.account.email');

            /**
             * Provides user account password updating
             */
            Route::patch('user/account/password', 'UserController@updateAccountPassword')
                ->name('api.user.account.password');
        });
    });
});
