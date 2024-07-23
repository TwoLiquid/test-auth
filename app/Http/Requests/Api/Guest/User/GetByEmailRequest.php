<?php

namespace App\Http\Requests\Api\Guest\User;

use App\Http\Requests\Api\BaseRequest;

/**
 * Class GetByEmailRequest
 *
 * @package App\Http\Requests\Api\Guest\User
 */
class GetByEmailRequest extends BaseRequest
{
    /**
     * @return array
     */
    public function rules() : array
    {
        return [
            'email' => 'required|email|exists:users,email'
        ];
    }

    /**
     * @return array
     */
    public function messages() : array
    {
        return [
            'email.required' => trans('validations/api/guest/user/getByEmail.email.required'),
            'email.email'    => trans('validations/api/guest/user/getByEmail.email.email'),
            'email.exists'   => trans('validations/api/guest/user/getByEmail.email.exists')
        ];
    }
}
