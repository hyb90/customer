<?php


namespace App\Http\Requests\General\Pages;


use Illuminate\Foundation\Http\FormRequest;

class DeletePageRequest extends FormRequest
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
            'created_by_user_id' => 'integer|nullable',
            'updated_by_user_id' => 'integer|nullable',
            'deleted_by_user_id' => 'integer|nullable'
        ];
    }
    public function validationData(): array
    {
        return $this->json()->all();
    }
}
