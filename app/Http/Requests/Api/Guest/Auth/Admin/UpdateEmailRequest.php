<?php

namespace App\Http\Requests\Api\Guest\Auth\Admin;

use App\Http\Requests\Api\BaseRequest;

/**
 * Class UpdateEmailRequest
 *
 * @package App\Http\Requests\Api\Guest\Auth\Admin
 */
class UpdateEmailRequest extends BaseRequest
{
    /**
     * @return array
     */
    public function rules() : array
    {
        return [
            'email'     => 'required|email|exists:users,email',
            'new_email' => 'required|email'
        ];
    }

    /**
     * @return array
     */
    public function messages() : array
    {
        return [
            'email.required'     => trans('validations/api/guest/auth/admin/updateEmail.email.required'),
            'email.email'        => trans('validations/api/guest/auth/admin/updateEmail.email.string'),
            'email.exists'       => trans('validations/api/guest/auth/admin/updateEmail.email.exists'),
            'new_email.required' => trans('validations/api/guest/auth/admin/updateEmail.new_email.required'),
            'new_email.email'    => trans('validations/api/guest/auth/admin/updateEmail.new_email.string')
        ];
    }
}
