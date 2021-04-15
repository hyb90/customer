<?php


namespace App\Http\Requests\Employees\Employee;


use Illuminate\Foundation\Http\FormRequest;

class EditEmployeeRequest extends FormRequest
{

    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules(){
        return [
            'id'    =>  'required|exists:employees,user_id,deleted_at,NULL',
        ];
    }
    public function validationData(): array
    {
        return $this->json()->all();
    }
}
