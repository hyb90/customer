<?php


namespace App\Http\Requests\General\Regions;


use Illuminate\Foundation\Http\FormRequest;

class CreateRegionRequest extends FormRequest
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
            'names.*.region_name' => 'string|required|unique:region_translations,region_name',
            'names.*.region_description' => 'string|nullable',
            'names.*.translation_lang_id' => 'integer|required',
            'region_locations' => 'array|required|min:1',
            'region_locations.*.region_lat' => 'numeric|required',
            'region_locations.*.region_long' => 'numeric|required',
            'is_verified_from_us'   => 'integer|nullable',
            'region_type_id'        => 'integer|required|exists:region_types,id',
            'parent_region_id'      => 'integer|nullable|exists:regions,id',
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
