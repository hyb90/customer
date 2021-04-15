<?php

namespace App\Http\Requests\Orders\OrderTypes;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'names' => 'array|required|min:1',
            'names.*.order_type_name' => 'string|required|unique:order_type_translations,order_type_name',
            'names.*.translated_language_id' => 'integer|required|exists:translation_languages,id,deleted_at,NULL',
            'created_by_user_id' => 'integer|nullable',
            'updated_by_user_id' => 'integer|nullable',
            'deleted_by_user_id' => 'integer|nullable',
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
