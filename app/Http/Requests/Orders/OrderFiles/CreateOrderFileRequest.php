<?php

namespace App\Http\Requests\Orders\OrderFiles;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderFileRequest extends FormRequest
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
            'url' => 'string|required',
            'is_for_payment' => 'integer|nullable',
            'is_for_shipping' => 'integer|nullable',
            'order_id' => 'integer|required|exists:orders,id,deleted_at,NULL',
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
