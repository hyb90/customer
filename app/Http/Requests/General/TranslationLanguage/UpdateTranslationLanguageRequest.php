<?php


namespace App\Http\Requests\General\TranslationLanguage;


use Illuminate\Foundation\Http\FormRequest;

class UpdateTranslationLanguageRequest extends FormRequest
{

    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        return [
            'id'    => 'required|integer|exists:translation_languages,id,deleted_at,NULL',
            'name' => 'required|string',
            'name_in_native_language' => 'nullable|string',
            'language_code' => 'required|string',
            'is_default' => 'nullable|integer',
        ];

    }


    public function validationData(): array
    {
        return $this->json()->all();
    }

}
