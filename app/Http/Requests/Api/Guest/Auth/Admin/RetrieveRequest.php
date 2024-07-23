<?php

namespace App\Http\Requests\Api\Guest\Auth\Admin;

use App\Http\Requests\Api\BaseRequest;

/**
 * Class RetrieveRequest
 *
 * @package App\Http\Requests\Api\Guest\Auth\Admin
 */
class RetrieveRequest extends BaseRequest
{
    /**
     * @return array
     */
    public function rules() : array
    {
        return [
            'email'    => 'required|email|exists:users,email',
            'password' => 'required|string'
        ];
    }

    /**
     * @return array
     */
    public function messages() : array
    {
        return [
            'email.required'    => trans('validations/api/guest/auth/admin/retrieve.email.required'),
            'email.email'       => trans('validations/api/guest/auth/admin/retrieve.email.string'),
            'email.exists'      => trans('validations/api/guest/auth/admin/retrieve.email.exists'),
            'password.required' => trans('validations/api/guest/auth/admin/retrieve.password.required'),
            'password.string'   => trans('validations/api/guest/auth/admin/retrieve.password.string')
        ];
    }
}
