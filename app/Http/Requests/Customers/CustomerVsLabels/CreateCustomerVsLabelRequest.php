<?php


namespace App\Http\Requests\Customers\CustomerVsLabels;


use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerVsLabelRequest extends FormRequest
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
            'customer_id' 			    => 'required|exists:customers,user_id' ,
            'customer_label_id' 		=> 'required|exists:customer_labels,id' ,
			'created_by_user_id' 		=> 'required|exists:users,id' ,
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
