<?php


namespace App\Http\Requests\Customers\CustomerVsLabels;


use Illuminate\Foundation\Http\FormRequest;

class CustomersOfLabelRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        return [
            'customer_label_id'=> 'required|exists:customer_labels,id',
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
