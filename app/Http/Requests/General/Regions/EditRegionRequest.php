<?php


namespace App\Http\Requests\General\Regions;


use Illuminate\Foundation\Http\FormRequest;

class EditRegionRequest extends FormRequest
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
            'id'    => 'required|integer|exists:regions,id,deleted_at,NULL',

        ];
    }
    public function validationData(): array
    {
        return $this->json()->all();
    }
}
