<?php

namespace App\Http\Requests\Api\Guest\Auth\User;

use App\Http\Requests\Api\BaseRequest;

/**
 * Class RegisterRequest
 *
 * @package App\Http\Requests\Api\Guest\Auth\User
 */
class RegisterRequest extends BaseRequest
{
    /**
     * @return array
     */
    public function rules() : array
    {
        return [
            'username' => 'required|string|unique:users,username',
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
            'username.required' => trans('validations/api/guest/auth/user/register.username.required'),
            'username.string'   => trans('validations/api/guest/auth/user/register.username.string'),
            'username.unique'   => trans('validations/api/guest/auth/user/register.username.unique'),
            'email.required'    => trans('validations/api/guest/auth/user/register.email.required'),
            'email.email'       => trans('validations/api/guest/auth/user/register.email.email'),
            'email.unique'      => trans('validations/api/guest/auth/user/register.email.unique'),
            'password.required' => trans('validations/api/guest/auth/user/register.password.required'),
            'password.string'   => trans('validations/api/guest/auth/user/register.password.string')
        ];
    }
}
