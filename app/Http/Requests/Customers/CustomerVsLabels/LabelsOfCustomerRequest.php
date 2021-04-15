<?php


namespace App\Http\Requests\Customers\CustomerVsLabels;


use Illuminate\Foundation\Http\FormRequest;

class LabelsOfCustomerRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        return [
            'customer_id'=> 'required|exists:customers,user_id',
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
