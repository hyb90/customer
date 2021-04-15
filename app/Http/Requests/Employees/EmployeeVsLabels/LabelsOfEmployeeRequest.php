<?php


namespace App\Http\Requests\Employees\EmployeeVsLabels;


use Illuminate\Foundation\Http\FormRequest;

class LabelsOfEmployeeRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        return [
            'employee_id' 	=> 'required|exists:employees,user_id,deleted_at,NULL' ,
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
