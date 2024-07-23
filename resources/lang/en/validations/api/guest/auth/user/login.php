<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Api Auth Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error
    | messages used by the validator class
    |
    */

    'login' => [
        'required' => __('validations.api.guest.auth.user.login.login.required'),
        'string'   => __('validations.api.guest.auth.user.login.login.string')
    ],
    'password' => [
        'required' => __('validations.api.guest.auth.user.login.password.required'),
        'string'   => __('validations.api.guest.auth.user.login.password.string')
    ],
    'result' => [
        'error' => [
            'find'        => __('validations.api.guest.auth.user.login.result.error.find'),
            'credentials' => __('validations.api.guest.auth.user.login.result.error.credentials')
        ],
        'success' => __('validations.api.guest.auth.user.login.result.success')
    ]
];
