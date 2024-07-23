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

    'username' => [
        'required' => __('validations.api.guest.auth.user.register.username.required'),
        'string'   => __('validations.api.guest.auth.user.register.username.string'),
        'unique'   => __('validations.api.guest.auth.user.register.username.unique')
    ],
    'email' => [
        'required' => __('validations.api.guest.auth.user.register.email.required'),
        'email'    => __('validations.api.guest.auth.user.register.email.email'),
        'unique'   => __('validations.api.guest.auth.user.register.email.unique')
    ],
    'password' => [
        'required' => __('validations.api.guest.auth.user.register.password.required'),
        'string'   => __('validations.api.guest.auth.user.register.password.string')
    ],
    'result' => [
        'success' => __('validations.api.guest.auth.user.register.result.success')
    ]
];
