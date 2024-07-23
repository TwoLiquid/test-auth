<?php

namespace App\Http\Requests\Api\Guest\Auth;

use App\Http\Requests\Api\BaseRequest;

/**
 * Class CheckUsernameRequest
 *
 * @package App\Http\Requests\Api\Guest\Auth
 */
class CheckUsernameRequest extends BaseRequest
{
    /**
     * @return array
     */
    public function rules() : array
    {
        return [
            'username' => 'required|string|unique:users,username'
        ];
    }

    /**
     * @return array
     */
    public function messages() : array
    {
        return [
            'username.required' => trans('validations/api/guest/auth/checkUsername.username.required'),
            'username.email'    => trans('validations/api/guest/auth/checkUsername.username.email'),
            'username.unique'   => trans('validations/api/guest/auth/checkUsername.username.unique')
        ];
    }
}
