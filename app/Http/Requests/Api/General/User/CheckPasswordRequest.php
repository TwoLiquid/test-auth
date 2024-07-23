<?php

namespace App\Http\Requests\Api\General\User;

use App\Http\Requests\Api\BaseRequest;

/**
 * Class CheckPasswordRequest
 *
 * @package App\Http\Requests\Api\General\User
 */
class CheckPasswordRequest extends BaseRequest
{
    /**
     * @return array
     */
    public function rules() : array
    {
        return [
            'password' => 'required|string'
        ];
    }

    /**
     * @return array
     */
    public function messages() : array
    {
        return [
            'password.required' => trans('validations/api/general/user/checkPassword.password.required'),
            'password.string'   => trans('validations/api/general/user/checkPassword.password.string')
        ];
    }
}
