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

    'email' => [
        'required' => __('validations.api.guest.auth.admin.login.email.required'),
        'email'    => __('validations.api.guest.auth.admin.login.email.email'),
        'exists'   => __('validations.api.guest.auth.admin.login.email.exists')
    ],
    'password' => [
        'required' => __('validations.api.guest.auth.admin.login.password.required'),
        'string'   => __('validations.api.guest.auth.admin.login.password.string')
    ],
    'result' => [
        'error' => [
            'find'        => __('validations.api.guest.auth.admin.login.result.error.find'),
            'credentials' => __('validations.api.guest.auth.admin.login.result.error.credentials')
        ],
        'success' => __('validations.api.guest.auth.admin.login.result.success')
    ]
];
