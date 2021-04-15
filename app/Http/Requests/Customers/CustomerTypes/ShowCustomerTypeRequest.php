<?php


namespace App\Http\Requests\Customers\CustomerTypes;


use Illuminate\Foundation\Http\FormRequest;

class ShowCustomerTypeRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        return [
            'id'=> 'required|exists:customer_types,id',
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
