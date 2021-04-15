<?php


namespace App\Http\Requests\General\Regions\RegionTypes;


use Illuminate\Foundation\Http\FormRequest;

class CreateRegionTypeRequest extends FormRequest
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
            'names.*.region_type_name' => 'string|required|unique:region_type_translations,region_type_name',
            'names.*.translation_lang_id' => 'integer|required|exists:translation_languages,id',
            'verified_by_user_id'   => 'integer|nullable',
            'created_by_user_id'    => 'integer|nullable',
            'updated_by_user_id'    => 'integer|nullable',
            'deleted_by_user_id'    => 'integer|nullable',
        ];
    }
    public function validationData(): array
    {
        return $this->json()->all();
    }
}
