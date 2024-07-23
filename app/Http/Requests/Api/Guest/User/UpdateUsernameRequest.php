<?php

namespace App\Http\Requests\Api\Guest\User;

use App\Http\Requests\Api\BaseRequest;

/**
 * Class UpdatePasswordRequest
 *
 * @package App\Http\Requests\Api\Guest\User
 */
class UpdateUsernameRequest extends BaseRequest
{
    /**
     * @return array
     */
    public function rules() : array
    {
        return [
            'email'    => 'required|email|exists:users,email',
            'username' => 'required|string'
        ];
    }

    /**
     * @return array
     */
    public function messages() : array
    {
        return [
            'email.required'    => trans('validations/api/guest/user/updateUsername.email.required'),
            'email.email'       => trans('validations/api/guest/user/updateUsername.email.email'),
            'email.exists'      => trans('validations/api/guest/user/updateUsername.email.exists'),
            'username.required' => trans('validations/api/guest/user/updateUsername.username.required'),
            'username.string'   => trans('validations/api/guest/user/updateUsername.username.string')
        ];
    }
}
