<?php

namespace App\Http\Requests\Orders\OrderStatuses;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderStatusRequest extends FormRequest
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
            'names.*.order_status_name' => 'string|required|unique:order_status_translations,order_status_name',
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
