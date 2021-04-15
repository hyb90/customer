<?php


namespace App\Http\Requests\Employees\Employee;


use Illuminate\Foundation\Http\FormRequest;

class DestroyEmployeeRequest extends FormRequest
{

    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules(){
        $this->json()->remove('updated_by_user_id');
        $this->json()->remove('created_by_user_id');
        return [
            'id'            => 'required',
            'deleted_by_user_id'    => 'required|exists:users,id,deleted_at,NULL'
        ];
    }
    public function validationData(): array
    {
        return $this->json()->all();
    }
}
