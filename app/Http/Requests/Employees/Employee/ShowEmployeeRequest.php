<?php


namespace App\Http\Requests\Employees\Employee;


use Illuminate\Foundation\Http\FormRequest;

class ShowEmployeeRequest extends FormRequest
{

    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules(){
        return [
            'user_id'     => 'required|exists:users,id,deleted_at,NULL|exists:employees,user_id,deleted_at,NULL',
        ];
    }
    public function validationData(): array
    {
        return $this->json()->all();
    }
}
