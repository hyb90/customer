<?php

namespace App\Domain\Orders\OrderStatusTranslations\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class OrderStatusTranslationDTO extends DataTransferObject
{
    /* @var integer */
    public $order_status_id ;
    /* @var integer */
    public $translated_language_id  ;
    /* @var string */
    public $order_status_name ;
    /** @var integer|null */
    public $created_by_user_id;
    /** @var integer|null */
    public $updated_by_user_id;
    /** @var integer|null */
    public $deleted_by_user_id;

    public static function fromRequest($request){
        return new self([
            'order_status_id'           => $request['order_status_id'] ?? null,
            'translated_language_id'   => $request['translated_language_id'] ?? null,
            'order_status_name'         => $request['order_status_name'] ?? null,
            'created_by_user_id'=> $request['created_by_user_id'] ?? null ,
            'updated_by_user_id'=> $request['updated_by_user_id'] ?? null ,
            'deleted_by_user_id'=> $request['deleted_by_user_id'] ?? null ,

        ]);
    }
}
