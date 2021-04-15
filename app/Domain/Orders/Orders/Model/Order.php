<?php

namespace App\Domain\Orders\Orders\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Order extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'orders' ;

    protected $hidden=[
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'address_details',
        'delivered_to_person_name',
        'delivered_to_person_address',
        'delivered_to_person_mobile',
        'postal_code',
        'total_price',
        'shipping_cost',
        'shipping_rating',
        'free_shipping',
        'is_payment_done',
        'delivered_to_person_region_id',
        'user_id',
        'shipping_company_in_region_id',
        'service_id',
        'customer_address_id',
        'order_type_id',
        'currency_id',
        'description',
        'shipping_date',
        'order_status_id',
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',
    ];


}
