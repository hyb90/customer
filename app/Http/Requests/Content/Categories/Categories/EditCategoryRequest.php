<?php


namespace App\Http\Requests\Content\Categories\Categories;


use Illuminate\Foundation\Http\FormRequest;

class EditCategoryRequest extends FormRequest
{

    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'required|exists:categories,id,deleted_at,NULL',
        ];
    }
    public function validationData(): array
    {
        return $this->json()->all();
    }
}
