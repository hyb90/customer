<?php


namespace App\Http\Requests\Employees\SalaryTypes;


use Illuminate\Foundation\Http\FormRequest;

class UpdateSalaryTypeRequest extends FormRequest
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
            'id' => 'required|exists:salary_types,id',


        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
