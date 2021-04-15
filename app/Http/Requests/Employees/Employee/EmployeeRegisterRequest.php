<?php


namespace App\Http\Requests\Employees\Employee;


use App\Exceptions\RequestException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class EmployeeRegisterRequest extends FormRequest
{


    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules(){
        $this->json()->remove('updated_by_user_id');
        $this->json()->remove('deleted_by_user_id');
        return [
            'username'            => 'string|required|unique:users,username,NULL,id,deleted_at,NULL',
            'email'           => 'email|required|unique:users,email,NULL,id,deleted_at,NULL',
            'password'        => 'string|required|min:6',
            'confirm password'      => 'string|required|same:password',
            'avatar'          => 'string|nullable',
            'mobile_phone'    => 'string|nullable|unique:users,mobile_phone,deleted_at,NULL',
            'surname'         => 'string|nullable',
            'birthdate'       => 'string|nullable',
            'gender'          => 'string|nullable',
            'address'         => 'string|nullable',
            'role_id'         => 'integer|required|exists:roles,id',
            'region_id'       => 'integer|required|exists:regions,id',
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
