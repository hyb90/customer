<?php


namespace App\Http\Requests\General\Pages;


use App\Exceptions\RequestException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class CreatePageRequest extends FormRequest
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
            'name' => 'string|required|min:1|unique:pages,name,NULL,id,deleted_at,NULL',
            'endpoint' => 'string|nullable|unique:pages,name',
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
