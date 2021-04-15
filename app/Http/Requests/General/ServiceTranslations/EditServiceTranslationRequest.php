<?php


namespace App\Http\Requests\ServiceTranslations;


use Illuminate\Foundation\Http\FormRequest;

class EditServiceTranslationRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        return [
            'id'    => 'required|exists:service_translations,id',
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
