<?php


namespace App\Http\Requests\Customers\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRegisterRequest extends FormRequest
{


    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        $this->json()->remove('updated_by_user_id');
        $this->json()->remove('deleted_by_user_id');
        return [
            'username' => 'string|required|unique:users,username,NULL,id,deleted_at,NULL',
            'email' => 'email|required|unique:users,email,NULL,id,deleted_at,NULL',
            'password' => 'string|required|min:6',
            'confirm password' => 'string|required|same:password',
            'avatar' => 'string|nullable',
            'mobile_phone' => 'string|required|unique:users,mobile_phone,NULL,id,deleted_at,NULL',
            'surname' => 'string|nullable',
            'birthdate' => 'string|nullable',
            'gender' => 'string|nullable',
            'address' => 'string|nullable',
            'default_lang_id' => 'integer|required|exists:translation_languages,id',
            'region_id' => 'integer|required|exists:regions,id',
            'manager_id' => 'integer|required|exists:users,id',
            'customer_status_id' => 'integer|nullable|exists:customer_statuses,id',
            'customer_type_id' => 'integer|required|exists:customer_types,id',
            'created_by_user_id' => 'integer|nullable',
            'updated_by_user_id' => 'integer|nullable',
            'deleted_by_user_id' => 'integer|nullable',
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }

}
