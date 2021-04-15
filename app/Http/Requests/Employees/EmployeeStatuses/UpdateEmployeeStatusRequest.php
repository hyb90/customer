<?php


namespace App\Http\Requests\Employees\EmployeeStatuses;


use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeStatusRequest extends FormRequest
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
            'id'                    => 'required|exists:employee_statuses,id',
            'name'                  => 'required|string',
            'updated_by_user_id'    =>  'required|exists:users,id,deleted_at,NULL'

        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
