<?php

namespace App\Http\Requests\Content\Categories\Categories;

use App\Exceptions\RequestException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        return [
            'id'    => 'required|integer|exists:categories,id,deleted_at,NULL',
            'names' => 'array|required|min:1',
            'names.*.category_name' => 'string|required',
            'names.*.translation_lang_id' => 'integer|required|exists:translation_languages,id',
            'category_photos'   => 'array|required|min:1',
            'category_photos.*.device_id'  => 'integer|required|exists:devices,id',
            'category_photos.*.photo_path' => 'string|required',
            'category_photos.*.photo_size' => 'numeric|required',
            'category_regions' => 'array|required|min:1',
            'category_regions.*.region_id' => 'integer|required|exists:regions,id',
            'category_pages' => 'array|required|min:1',
            'category_pages.*.page_id' => 'integer|required|exists:pages,id',
            'max_price_new' => 'numeric|nullable',
            'min_price_new' => 'numeric|nullable',
            'max_price_old' => 'numeric|nullable',
            'min_price_old' => 'numeric|nullable',
            'show_pages' => 'string|nullable',
            'parent_id' => 'integer|nullable|exists:categories,id',
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
