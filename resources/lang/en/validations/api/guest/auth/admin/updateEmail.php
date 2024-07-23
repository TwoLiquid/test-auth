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
        'required' => __('validations.api.guest.auth.admin.updateEmail.email.required'),
        'email'    => __('validations.api.guest.auth.admin.updateEmail.email.email'),
        'exists'   => __('validations.api.guest.auth.admin.updateEmail.email.exists')
    ],
    'new_email' => [
        'required' => __('validations.api.guest.auth.admin.updateEmail.new_email.required'),
        'email'    => __('validations.api.guest.auth.admin.updateEmail.new_email.email'),
        'unique'   => __('validations.api.guest.auth.admin.updateEmail.new_email.unique')
    ],
    'result' => [
        'error' => [
            'find' => __('validations.api.guest.auth.admin.updateEmail.result.error.find')
        ],
        'success' => __('validations.api.guest.auth.admin.updateEmail.result.success')
    ]
];
