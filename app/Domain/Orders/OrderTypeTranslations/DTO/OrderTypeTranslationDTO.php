<?php

namespace App\Domain\Orders\OrderTypeTranslations\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class OrderTypeTranslationDTO extends DataTransferObject
{
    /* @var integer */
    public $order_type_id ;
    /* @var integer */
    public $translated_language_id  ;
    /* @var string */
    public $order_type_name ;
    /** @var integer|null */
    public $created_by_user_id;
    /** @var integer|null */
    public $updated_by_user_id;
    /** @var integer|null */
    public $deleted_by_user_id;

    public static function fromRequest($request){
        return new self([
            'order_type_id'           => $request['order_type_id'] ?? null,
            'translated_language_id'   => $request['translated_language_id'] ?? null,
            'order_type_name'         => $request['order_type_name'] ?? null,
            'created_by_user_id'=> $request['created_by_user_id'] ?? null ,
            'updated_by_user_id'=> $request['updated_by_user_id'] ?? null ,
            'deleted_by_user_id'=> $request['deleted_by_user_id'] ?? null ,

        ]);
    }
}
