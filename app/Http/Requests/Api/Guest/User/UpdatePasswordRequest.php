<?php

namespace App\Http\Requests\Api\Guest\User;

use App\Http\Requests\Api\BaseRequest;

/**
 * Class UpdatePasswordRequest
 *
 * @package App\Http\Requests\Api\Guest\User
 */
class UpdatePasswordRequest extends BaseRequest
{
    /**
     * @return array
     */
    public function rules() : array
    {
        return [
            'email'    => 'required|email|exists:users,email',
            'password' => 'required|string'
        ];
    }

    /**
     * @return array
     */
    public function messages() : array
    {
        return [
            'email.required'    => trans('validations/api/guest/user/updatePassword.email.required'),
            'email.email'       => trans('validations/api/guest/user/updatePassword.email.email'),
            'email.exists'      => trans('validations/api/guest/user/updatePassword.email.exists'),
            'password.required' => trans('validations/api/guest/user/updatePassword.password.required'),
            'password.string'   => trans('validations/api/guest/user/updatePassword.password.string')
        ];
    }
}
