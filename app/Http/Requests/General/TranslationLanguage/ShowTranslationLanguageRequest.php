<?php


namespace App\Http\Requests\General\TranslationLanguage;


use Illuminate\Foundation\Http\FormRequest;

class ShowTranslationLanguageRequest extends FormRequest
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

        ];

    }


    public function validationData(): array
    {
        return $this->json()->all();
    }
}
