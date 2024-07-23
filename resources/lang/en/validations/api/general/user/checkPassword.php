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

    'password' => [
        'required' => __('validations.api.general.user.checkPassword.password.required'),
        'string'   => __('validations.api.general.user.checkPassword.password.string')
    ],
    'result' => [
        'error'   => [
            'password' => __('validations.api.general.user.checkPassword.result.error.password')
        ],
        'success' => __('validations.api.general.user.checkPassword.result.success')
    ]
];
