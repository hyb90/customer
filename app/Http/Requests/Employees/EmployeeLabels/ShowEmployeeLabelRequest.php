<?php


namespace App\Http\Requests\Employees\EmployeeLabels;


use Illuminate\Foundation\Http\FormRequest;

class ShowEmployeeLabelRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        return [
            'id'=> 'required|exists:employee_labels,id',
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
