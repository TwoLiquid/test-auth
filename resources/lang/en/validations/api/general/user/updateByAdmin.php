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

    'username' => [
        'required' => __('validations.api.general.user.updateByAdmin.username.required'),
        'string'   => __('validations.api.general.user.updateByAdmin.username.string'),
        'unique'   => __('validations.api.general.user.updateByAdmin.username.unique')
    ],
    'email' => [
        'required' => __('validations.api.general.user.updateByAdmin.email.required'),
        'regex'    => __('validations.api.general.user.updateByAdmin.email.regex'),
        'unique'   => __('validations.api.general.user.updateByAdmin.email.unique')
    ],
    'password' => [
        'string' => __('validations.api.general.user.updateByAdmin.password.string')
    ],
    'result' => [
        'success' => __('validations.api.general.user.updateByAdmin.result.success')
    ]
];
