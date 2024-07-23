<?php

namespace App\Http\Requests\Api\General\User;

use App\Http\Requests\Api\BaseRequest;

/**
 * Class UpdateAccountEmailRequest
 *
 * @package App\Http\Requests\Api\General\User
 */
class UpdateAccountEmailRequest extends BaseRequest
{
    /**
     * @return array
     */
    public function rules() : array
    {
        return [
            'email' => 'required|email|unique:users,email'
        ];
    }

    /**
     * @return array
     */
    public function messages() : array
    {
        return [
            'email.required' => trans('validations/api/general/user/updateAccountEmail.email.required'),
            'email.email'    => trans('validations/api/general/user/updateAccountEmail.email.email'),
            'email.unique'   => trans('validations/api/general/user/updateAccountEmail.email.unique')
        ];
    }
}
