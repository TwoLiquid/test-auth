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
        'required' => __('validations.api.general.auth.checkUsername.username.required'),
        'string'   => __('validations.api.general.auth.checkUsername.username.string')
    ],
    'result' => [
        'success' => __('validations.api.general.auth.checkUsername.result.success')
    ]
];
