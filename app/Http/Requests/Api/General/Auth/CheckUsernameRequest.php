<?php

namespace App\Http\Requests\Api\General\Auth;

use App\Http\Requests\Api\BaseRequest;

/**
 * Class CheckUsernameRequest
 *
 * @package App\Http\Requests\Api\General\Auth
 */
class CheckUsernameRequest extends BaseRequest
{
    /**
     * @return array
     */
    public function rules() : array
    {
        return [
            'username' => 'required|string'
        ];
    }

    /**
     * @return array
     */
    public function messages() : array
    {
        return [
            'username.required' => trans('validations/api/general/auth/checkUsername.username.required'),
            'username.email'    => trans('validations/api/general/auth/checkUsername.username.email')
        ];
    }
}
