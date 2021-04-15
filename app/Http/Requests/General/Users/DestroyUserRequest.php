<?php


namespace App\Http\Requests\General\Users;


use Illuminate\Foundation\Http\FormRequest;

class DestroyUserRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        $this->json()->remove('created_by_user_id');
        $this->json()->remove('updated_by_user_id');
        return [
            'id' => 'integer | required | exists:users',
            'deleted_by_user_id'    =>  'required | exists:users,id,deleted_at,NULL',
        ];

    }

    public function validationData()
    {
        return $this->json()->all();
    }
}
