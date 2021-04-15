<?php


namespace App\Http\Requests\General\TranslationLanguage;

use Illuminate\Foundation\Http\FormRequest;

class CreateTranslationLanguageRequest extends FormRequest
{

    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|unique:translation_languages',
            'name_in_native_language' => 'nullable|string',
            'language_code' => 'required|string|unique:translation_languages,language_code',
            'is_default' => 'nullable|integer',
        ];

    }


    public function validationData(): array
    {
        return $this->json()->all();
    }

}
