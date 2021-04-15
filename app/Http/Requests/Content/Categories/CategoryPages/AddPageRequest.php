<?php


namespace App\Http\Requests\Content\Categories\CategoryPages;


use App\Exceptions\RequestException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class AddPageRequest extends FormRequest
{
    /* @var integer */
    public $category_id;
    /* @var integer */
    public $page_id;



    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        return [
            'category_id'       =>  'integer|required|exists:categories,id',
            'page_id'           =>  'integer|required|exists:pages,id',
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
