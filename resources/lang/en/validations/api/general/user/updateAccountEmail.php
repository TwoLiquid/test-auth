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

    'email' => [
        'required' => __('validations.api.general.user.updateAccountEmail.email.required'),
        'email'    => __('validations.api.general.user.updateAccountEmail.email.email'),
        'unique'   => __('validations.api.general.user.updateAccountEmail.email.unique')
    ],
    'result' => [
        'success' => __('validations.api.general.user.updateAccountEmail.result.success')
    ]
];
