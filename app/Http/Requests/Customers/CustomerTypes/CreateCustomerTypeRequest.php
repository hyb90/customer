<?php


namespace App\Http\Requests\Customers\CustomerTypes;


use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerTypeRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        $this->json()->remove('updated_by_user_id');
        $this->json()->remove('deleted_by_user_id');
        return [
            'name'                  =>'required|unique:customer_types,name',
            'created_by_user_id' 	=> 'required|exists:users,id,deleted_at,NULL',
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
