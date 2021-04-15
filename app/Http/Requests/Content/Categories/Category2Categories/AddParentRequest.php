<?php

namespace App\Http\Requests\Content\Categories\Category2Categories;

use App\Exceptions\RequestException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class AddParentRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules(){
        return [
            'parent_id' => 'integer | required | exists:categories,id',
            'son_id' => 'integer | required | exists:categories,id',
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }

}
