<?php


namespace App\Http\Requests\Content\Categories\Category2Categories;


use App\Exceptions\RequestException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class RemoveParentRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules(){
        return [
            'parent_id' => 'integer | required | exists:categories,id,deleted_at,NULL',
            'son_id'    => 'integer | required | exists:categories,id,deleted_at,NULL',
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }

}
