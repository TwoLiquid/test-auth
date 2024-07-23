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
         * User namespace
         */
        Route::group(['namespace' => 'User'], function () {

            /**
             * Provides getting user by email
             */
            Route::get('user/by/{id}', 'UserController@getById')
                ->name('api.user.by.id');

            /**
             * Provides getting user by email
             */
            Route::post('user/email', 'UserController@getByEmail')
                ->name('api.user.email.get');

            /**
             * Provides user password updating
             */
            Route::patch('user/password/reset', 'UserController@updatePassword')
                ->name('api.user.password.reset');

            /**
             * Provides user username updating
             */
            Route::patch('user/username', 'UserController@updateUsername')
                ->name('api.user.username.update');
        });
    });
});
