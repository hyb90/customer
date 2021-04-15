<?php


namespace App\Http\Requests\SalaryTypes;


use Illuminate\Foundation\Http\FormRequest;

class CreateSalaryTypeRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        $this->json()->remove('updated_by_user_id');
        $this->json()->remove('deleted_by_user_id');
        return [
            
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
