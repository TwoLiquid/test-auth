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
        'required' => __('validations.api.guest.auth.admin.retrieve.email.required'),
        'email'    => __('validations.api.guest.auth.admin.retrieve.email.email'),
        'exists'   => __('validations.api.guest.auth.admin.retrieve.email.exists')
    ],
    'password' => [
        'required' => __('validations.api.guest.auth.admin.retrieve.password.required'),
        'string'   => __('validations.api.guest.auth.admin.retrieve.password.string')
    ],
    'result' => [
        'error' => [
            'find'        => __('validations.api.guest.auth.admin.retrieve.result.error.find'),
            'credentials' => __('validations.api.guest.auth.admin.retrieve.result.error.credentials')
        ],
        'success' => __('validations.api.guest.auth.admin.retrieve.result.success')
    ]
];
