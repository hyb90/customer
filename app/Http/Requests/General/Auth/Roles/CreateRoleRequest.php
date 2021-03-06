<?php


namespace App\Http\Requests\General\Auth\Roles;


use Illuminate\Foundation\Http\FormRequest;

class CreateRoleRequest  extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'string | required | unique:roles,name',
            'description' => 'string | required ',
        ];

    }

    public function validationData()
    {
        return $this->json()->all(); // TODO: Change the autogenerated stub
    }

}
