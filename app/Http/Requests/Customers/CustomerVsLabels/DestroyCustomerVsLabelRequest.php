<?php


namespace App\Http\Requests\Customers\CustomerVsLabels;


use Illuminate\Foundation\Http\FormRequest;

class DestroyCustomerVsLabelRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        $this->json()->remove('created_by_user_id');
        $this->json()->remove('updated_by_user_id');
        return [
            'id' => 'required|exists:customer_vs_labels',
            'deleted_by_user_id' => 'required|exists:users,id',
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
