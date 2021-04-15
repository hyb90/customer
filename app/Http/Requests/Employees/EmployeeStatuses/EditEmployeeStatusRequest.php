<?php


namespace App\Http\Requests\Employees\EmployeeStatuses;


use Illuminate\Foundation\Http\FormRequest;

class EditEmployeeStatusRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {

        return [
            'id' => 'required|exists:employee_statuses,id'
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
