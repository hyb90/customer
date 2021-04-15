<?php


namespace App\Http\Requests\SalaryTypes;


use Illuminate\Foundation\Http\FormRequest;

class EditSalaryTypeRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {

        return [
            'id' => 'required|exists:salary_types,id'
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
