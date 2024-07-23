<?php

namespace App\Http\Requests\Api\Guest\Auth\Admin;

use App\Http\Requests\Api\BaseRequest;

/**
 * Class RegisterRequest
 *
 * @package App\Http\Requests\Api\Guest\Auth\Admin
 */
class RegisterRequest extends BaseRequest
{
    /**
     * @return array
     */
    public function rules() : array
    {
        return [
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string'
        ];
    }

    /**
     * @return array
     */
    public function messages() : array
    {
        return [
            'email.required'    => trans('validations/api/guest/auth/admin/register.email.required'),
            'email.email'       => trans('validations/api/guest/auth/admin/register.email.email'),
            'email.unique'      => trans('validations/api/guest/auth/admin/register.email.unique'),
            'password.required' => trans('validations/api/guest/auth/admin/register.password.required'),
            'password.string'   => trans('validations/api/guest/auth/admin/register.password.string')
        ];
    }
}
