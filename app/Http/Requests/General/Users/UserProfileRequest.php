<?php


namespace App\Http\Requests\General\Users;


use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'required|exists:users,id,deleted_at,NULL',
        ];
    }

    public function validationData()
    {
        return $this->json()->all();
    }
}
