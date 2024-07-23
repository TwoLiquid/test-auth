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
        'required' => __('validations.api.guest.user.updatePassword.email.required'),
        'email'    => __('validations.api.guest.user.updatePassword.email.email'),
        'exists'   => __('validations.api.guest.user.updatePassword.email.exists')
    ],
    'password' => [
        'required' => __('validations.api.guest.user.updatePassword.password.required'),
        'string'   => __('validations.api.guest.user.updatePassword.password.string')
    ],
    'result' => [
        'error' => [
            'find' => __('validations.api.guest.user.updatePassword.result.error.find')
        ],
        'success' => __('validations.api.guest.user.updatePassword.result.success')
    ]
];
