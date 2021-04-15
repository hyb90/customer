<?php


namespace App\Http\Requests\Customers\CustomerTypes;


use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerTypeRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        $this->json()->remove('created_by_user_id');
        $this->json()->remove('deleted_by_user_id');
        return [
            'id' => 'required|exists:customer_types,id',
            'created_by_user_id' 					=> '' ,
			'updated_by_user_id' 					=> '' ,
			'deleted_by_user_id' 					=> '' ,
			'id' 					=> '' ,
			'users' 					=> '' ,
			'cascade' 					=> '' ,
			'customer_types' 					=> '' ,


        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
