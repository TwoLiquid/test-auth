<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Api General Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error
    | messages used by the validator class
    |
    */

    'password' => [
        'required' => __('validations.api.general.user.updateAccountPassword.password.required'),
        'string'   => __('validations.api.general.user.updateAccountPassword.password.string')
    ],
    'result' => [
        'success' => __('validations.api.general.user.updateAccountPassword.result.success')
    ]
];
