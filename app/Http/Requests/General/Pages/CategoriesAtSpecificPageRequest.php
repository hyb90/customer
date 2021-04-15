<?php


namespace App\Http\Requests\General\Pages;


use Illuminate\Foundation\Http\FormRequest;

class CategoriesAtSpecificPageRequest extends FormRequest
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
            'page_id' => 'integer|required|exists:pages,id,deleted_at,NULL',
        ];
    }
    public function validationData(): array
    {
        return $this->json()->all();
    }
}
