<?php

namespace App\Http\Requests\Api\General\User;

use App\Http\Requests\Api\BaseRequest;

/**
 * Class UpdateAccountEmailRequest
 *
 * @package App\Http\Requests\Api\General\User
 */
class UpdateByAdminRequest extends BaseRequest
{
    /**
     * @return array
     */
    public function rules() : array
    {
        return [
            'username' => 'required|string|unique:users,username,' . $this->route('id'),
            'email'    => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,20}$/ix|unique:users,email,' . $this->route('id'),
            'password' => 'string|nullable'
        ];
    }

    /**
     * @return array
     */
    public function messages() : array
    {
        return [
            'username.required' => trans('validations/api/general/user/updateByAdmin.username.required'),
            'username.string'   => trans('validations/api/general/user/updateByAdmin.username.string'),
            'username.unique'   => trans('validations/api/general/user/updateByAdmin.username.unique'),
            'email.required'    => trans('validations/api/general/user/updateByAdmin.email.required'),
            'email.regex'       => trans('validations/api/general/user/updateByAdmin.email.email'),
            'email.unique'      => trans('validations/api/general/user/updateByAdmin.email.unique'),
            'password.string'   => trans('validations/api/general/user/updateByAdmin.password.string')
        ];
    }
}
