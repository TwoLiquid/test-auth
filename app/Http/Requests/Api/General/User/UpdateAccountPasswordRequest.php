<?php

namespace App\Http\Requests\Api\General\User;

use App\Http\Requests\Api\BaseRequest;

/**
 * Class UpdateAccountPasswordRequest
 *
 * @package App\Http\Requests\Api\General\User
 */
class UpdateAccountPasswordRequest extends BaseRequest
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
            'password.required' => trans('validations/api/general/user/updateAccountPassword.password.required'),
            'password.string'   => trans('validations/api/general/user/updateAccountPassword.password.string')
        ];
    }
}
