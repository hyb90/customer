<?php


namespace App\Http\Requests\Employees\EmployeeVsLabels;


use Illuminate\Foundation\Http\FormRequest;

class EmployeesOfLabelRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        return [
            'employee_label_id'=> 'required|exists:employee_labels,id,deleted_at,NULL',
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
