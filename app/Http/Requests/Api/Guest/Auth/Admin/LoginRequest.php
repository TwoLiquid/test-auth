<?php

namespace App\Http\Requests\Api\Guest\Auth\Admin;

use App\Http\Requests\Api\BaseRequest;

/**
 * Class LoginRequest
 *
 * @package App\Http\Requests\Api\Guest\Auth\Admin
 */
class LoginRequest extends BaseRequest
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
            'email.required'    => trans('validations/api/guest/auth/admin/login.email.required'),
            'email.email'       => trans('validations/api/guest/auth/admin/login.email.string'),
            'email.exists'      => trans('validations/api/guest/auth/admin/login.email.exists'),
            'password.required' => trans('validations/api/guest/auth/admin/login.password.required'),
            'password.string'   => trans('validations/api/guest/auth/admin/login.password.string')
        ];
    }
}
