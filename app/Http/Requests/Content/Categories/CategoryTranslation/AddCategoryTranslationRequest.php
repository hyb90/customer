<?php


namespace App\Http\Requests\Content\Categories\CategoryTranslation;


use App\Exceptions\RequestException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class AddCategoryTranslationRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        return [
            'category_translations' => 'array|required',
            'category_translations.*.category_id' => 'integer|required|exists:categories,id',
            'category_translations.*.translation_lang_id' => 'integer|required|exists:translation_languages,id',
            'category_translations.*.category_name' => 'string|required',
        ];
    }
    public function validationData(): array
    {
        return $this->json()->all();
    }

}
