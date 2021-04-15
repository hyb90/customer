<?php

namespace App\Http\Requests\Orders\Orders;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'address_details'=> 'string|required' ,
            'delivered_to_person_name'=>'string|required' ,
            'delivered_to_person_address'=> 'string|required' ,
            'delivered_to_person_mobile'=> 'string|required' ,
            'postal_code'=>  'string|required',
            'total_price'=> 'regex:/^\d+(\.\d{1,2})?$/|required' ,
            'shipping_cost'=> 'regex:/^\d+(\.\d{1,2})?$/|required' ,
            'shipping_rating'=> 'integer|required' ,
            'free_shipping'=>'integer|nullable' ,
            'is_payment_done'=>'integer|nullable',
            'delivered_to_person_region_id'=> 'integer|required' ,
            'user_id'=> 'integer|required|exists:users,id,deleted_at,NULL',
            'shipping_company_in_region_id'=>'integer|required',
            'service_id'=> 'integer|required',
            'customer_address_id'=> 'integer|required',
            'order_type_id'=> 'integer|required|exists:order_types,id,deleted_at,NULL',
            'currency_id'=> 'integer|required' ,
            'description'=> 'string|required',
            'order_status_id'=> 'integer|required|exists:order_statuses,id,deleted_at,NULL' ,
            'shipping_date'=> 'date_format:m/d/Y|required' ,
            'created_by_user_id'=>  'integer|nullable',
            'updated_by_user_id'=>  'integer|nullable',
            'deleted_by_user_id'=>  'integer|nullable',
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
