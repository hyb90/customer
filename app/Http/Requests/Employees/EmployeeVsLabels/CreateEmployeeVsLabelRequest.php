<?php


namespace App\Http\Requests\Employees\EmployeeVsLabels;


use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeVsLabelRequest extends FormRequest
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
            'employee_id'           => 'required|exists:employees,user_id,deleted_at,NULL',
            'employee_label_id'     => 'required|exists:employee_labels,id,deleted_at,NULL',
            'created_by_user_id'    => 'required|exists:users,id,deleted_at,NULL',

        ];
    }
    public function validationData(): array
    {
        return $this->json()->all();
    }

}
