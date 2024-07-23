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
        'required' => __('validations.api.guest.user.updateUsername.email.required'),
        'email'    => __('validations.api.guest.user.updateUsername.email.email'),
        'exists'   => __('validations.api.guest.user.updateUsername.email.exists')
    ],
    'username' => [
        'required' => __('validations.api.guest.user.updateUsername.username.required'),
        'string'   => __('validations.api.guest.user.updateUsername.username.string')
    ],
    'result' => [
        'error' => [
            'find' => __('validations.api.guest.user.updateUsername.result.error.find')
        ],
        'success' => __('validations.api.guest.user.updateUsername.result.success')
    ]
];
