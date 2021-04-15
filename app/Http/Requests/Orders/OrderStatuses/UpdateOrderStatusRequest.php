<?php

namespace App\Http\Requests\Orders\OrderStatuses;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderStatusRequest extends FormRequest
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
            'names.*.id' => 'integer|required|exists:order_status_translations,id,deleted_at,NULL',
            'names.*.order_status_name' => 'string|required',
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
