<?php


namespace App\Http\Requests\Customers\CustomerStatuses;


use Illuminate\Foundation\Http\FormRequest;

class DestroyCustomerStatusRequest extends FormRequest
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
            'id' => 'required|exists:customer_statuses',
            'deleted_by_user_id' => 'required|exists:users,id',
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
