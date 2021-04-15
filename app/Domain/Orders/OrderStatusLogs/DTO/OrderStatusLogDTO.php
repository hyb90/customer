<?php

namespace App\Domain\Orders\OrderStatusLogs\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class OrderStatusLogDTO extends DataTransferObject
{
    /** @var integer|null */
    public $order_id;
    /** @var integer|null */
    public $order_status_id;
    /** @var integer|null */
    public $created_by_user_id;
    /** @var integer|null */
    public $updated_by_user_id;
    /** @var integer|null */
    public $deleted_by_user_id;

    public static function fromRequest($request){
        return new self([
            'order_id'=> $request['order_id'] ?? null ,
            'order_status_id'=> $request['order_status_id'] ?? null ,
            'created_by_user_id'=> $request['created_by_user_id'] ?? null ,
            'updated_by_user_id'=> $request['updated_by_user_id'] ?? null ,
            'deleted_by_user_id'=> $request['deleted_by_user_id'] ?? null ,
        ]);
    }
}
