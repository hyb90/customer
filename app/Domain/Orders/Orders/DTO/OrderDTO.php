<?php

namespace App\Domain\Orders\Orders\DTO;

use Carbon\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

class OrderDTO extends DataTransferObject
{
    /** @var string|null */
    public $address_details;
    /** @var string|null */
    public $delivered_to_person_name;
    /** @var string|null */
    public $delivered_to_person_address;
    /** @var string|null */
    public $delivered_to_person_mobile;
    /** @var string|null */
    public $postal_code;
    /** @var double|null */
    public $total_price;
    /** @var double|null */
    public $shipping_cost;
    /** @var integer|null */
    public $shipping_rating;
    /** @var integer|null */
    public $free_shipping;
    /** @var integer|null */
    public $is_payment_done;
    /** @var integer|null */
    public $delivered_to_person_region_id;
    /** @var integer|null */
    public $user_id;
    /** @var integer|null */
    public $shipping_company_in_region_id;
    /** @var integer|null */
    public $service_id;
    /** @var integer|null */
    public $customer_address_id;
    /** @var integer|null */
    public $order_type_id;
    /** @var integer|null */
    public $currency_id;
    /** @var integer|null */
    public $order_status_id;
    /** @var integer|null */
    public $created_by_user_id;
    /** @var integer|null */
    public $updated_by_user_id;
    /** @var integer|null */
    public $deleted_by_user_id;
    /** @var string|null */
    public $description;
    /** @var \Carbon\Carbon */
    public $shipping_date;


    public static function fromRequest($request){
        return new self([
            'address_details'=> $request['address_details'] ?? null ,
            'delivered_to_person_name'=> $request['delivered_to_person_name'] ?? null ,
            'delivered_to_person_address'=> $request['delivered_to_person_address'] ?? null ,
            'delivered_to_person_mobile'=> $request['delivered_to_person_mobile'] ?? null ,
            'postal_code'=> $request['postal_code'] ?? null ,
            'total_price'=> $request['total_price'] ?? null ,
            'shipping_cost'=> $request['shipping_cost'] ?? null ,
            'shipping_rating'=> $request['shipping_rating'] ?? null ,
            'free_shipping'=> $request['free_shipping'] ?? 0 ,
            'is_payment_done'=> $request['is_payment_done'] ?? 0 ,
            'delivered_to_person_region_id'=> $request['delivered_to_person_region_id'] ?? null ,
            'user_id'=> $request['user_id'] ?? null ,
            'shipping_company_in_region_id'=> $request['shipping_company_in_region_id'] ?? null ,
            'service_id'=> $request['service_id'] ?? null ,
            'customer_address_id'=> $request['customer_address_id'] ?? null ,
            'order_type_id'=> $request['order_type_id'] ?? null ,
            'currency_id'=> $request['currency_id'] ?? null ,
            'description'=> $request['description'] ?? null ,
            'order_status_id'=> $request['order_status_id'] ?? null ,
            'shipping_date'=> Carbon::make($request['shipping_date']) ?? null ,
            'created_by_user_id'=> $request['created_by_user_id'] ?? null ,
            'updated_by_user_id'=> $request['updated_by_user_id'] ?? null ,
            'deleted_by_user_id'=> $request['deleted_by_user_id'] ?? null ,
        ]);
    }
}
