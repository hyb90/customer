<?php


namespace App\Http\Requests\Customers\CustomerLabels;


use Illuminate\Foundation\Http\FormRequest;

class EditCustomerLabelRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {

        return [
            'id' => 'required|exists:customer_labels,id'
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
