<?php

namespace App\Domain\Orders\OrderFiles\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class OrderFileDTO extends DataTransferObject
{
    /** @var integer|null */
    public $order_id;
    /** @var string|null */
    public $url;
    /** @var integer|null */
    public $is_for_payment;
    /** @var integer|null */
    public $is_for_shipping;
    /** @var integer|null */
    public $created_by_user_id;
    /** @var integer|null */
    public $updated_by_user_id;
    /** @var integer|null */
    public $deleted_by_user_id;

    public static function fromRequest($request){
        return new self([
            'url'=> $request['url'] ?? null ,
            'order_id'=> $request['order_id'] ?? null ,
            'is_for_payment'=> $request['is_for_payment'] ?? 0 ,
            'is_for_shipping'=> $request['is_for_shipping'] ?? 0 ,
            'created_by_user_id'=> $request['created_by_user_id'] ?? null ,
            'updated_by_user_id'=> $request['updated_by_user_id'] ?? null ,
            'deleted_by_user_id'=> $request['deleted_by_user_id'] ?? null ,
        ]);
    }
}
