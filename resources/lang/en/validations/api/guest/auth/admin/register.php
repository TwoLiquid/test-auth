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
        'required' => __('validations.api.guest.auth.admin.register.username.required'),
        'string'   => __('validations.api.guest.auth.admin.register.username.string'),
        'unique'   => __('validations.api.guest.auth.admin.register.username.unique')
    ],
    'email' => [
        'required' => __('validations.api.guest.auth.admin.register.email.required'),
        'email'    => __('validations.api.guest.auth.admin.register.email.email'),
        'unique'   => __('validations.api.guest.auth.admin.register.email.unique')
    ],
    'password' => [
        'required' => __('validations.api.guest.auth.admin.register.password.required'),
        'string'   => __('validations.api.guest.auth.admin.register.password.string')
    ],
    'result' => [
        'success' => __('validations.api.guest.auth.admin.register.result.success')
    ]
];
