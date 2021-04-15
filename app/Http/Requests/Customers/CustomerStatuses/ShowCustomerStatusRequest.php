<?php


namespace App\Http\Requests\Customers\CustomerStatuses;


use Illuminate\Foundation\Http\FormRequest;

class ShowCustomerStatusRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        return [
            'id'=> 'required|exists:customer_statuses,id',
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
