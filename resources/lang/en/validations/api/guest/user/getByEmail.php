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
        'required' => __('validations.api.guest.user.getByEmail.email.required'),
        'email'    => __('validations.api.guest.user.getByEmail.email.email'),
        'exists'   => __('validations.api.guest.user.getByEmail.email.exists')
    ],
    'result' => [
        'error' => [
            'find' => __('validations.api.guest.user.getByEmail.result.error.find')
        ],
        'success' => __('validations.api.guest.user.getByEmail.result.success')
    ]
];
