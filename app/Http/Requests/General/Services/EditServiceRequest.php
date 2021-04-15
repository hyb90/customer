<?php


namespace App\Http\Requests\General\Services;


use Illuminate\Foundation\Http\FormRequest;

class EditServiceRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        return [
            'id'  =>'required|exists:services,id,deleted_at,NULL',

        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
