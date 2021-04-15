<?php


namespace App\Http\Requests\Employees\EmployeeLabels;


use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeLabelRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        $this->json()->remove('created_by_user_id');
        $this->json()->remove('deleted_by_user_id');
        return [
            'id' => 'required|exists:employee_labels,id',
            'name' 					                => 'required|string' ,
			'updated_by_user_id' 					=> 'required|exists:users,id' ,
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
