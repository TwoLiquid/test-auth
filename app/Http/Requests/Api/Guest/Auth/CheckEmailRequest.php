<?php

namespace App\Http\Requests\Api\Guest\Auth;

use App\Http\Requests\Api\BaseRequest;

/**
 * Class CheckEmailRequest
 *
 * @package App\Http\Requests\Api\Guest\Auth
 */
class CheckEmailRequest extends BaseRequest
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
            'email.required' => trans('validations/api/guest/auth/checkEmail.email.required'),
            'email.email'    => trans('validations/api/guest/auth/checkEmail.email.email'),
            'email.unique'   => trans('validations/api/guest/auth/checkEmail.email.unique')
        ];
    }
}
