<?php

namespace App\Http\Requests\General\Auth\Roles;

use Illuminate\Foundation\Http\FormRequest;

class ChangeRoleRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        return [
            'role_id' => 'required | exists:roles,id',
            'user_id' => 'required | exists:users,id'
        ];

    }

}
