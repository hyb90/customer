<?php

namespace App\Domain\Content\Categories\Category\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class CategoryDTO extends DataTransferObject
{
    public $id;
    public $max_price_new;
    public $min_price_new;
    public $max_price_old;
    public $min_price_old;
    public $is_verified_from_us;
    public $show_pages;
    public $created_by_user_id;
    public $updated_by_user_id;
    public $deleted_by_user_id;

    public static function fromRequest($request){
        return new self([
            'id'           => $request['id'] ?? null ,
            'max_price_new'=> $request['max_price_new'] ?? null ,
            'min_price_new'=> $request['min_price_new'] ?? null ,
            'max_price_old'=> $request['max_price_old'] ?? null ,
            'min_price_old'=> $request['min_price_old'] ?? null ,
            'is_verified_from_us'=> $request['is_verified_from_us'] ?? null ,
            'show_pages'=>     $request['show_pages'] ?? null ,
            'created_by_user_id'=> $request['created_by_user_id'] ?? null ,
            'updated_by_user_id'=> $request['updated_by_user_id'] ?? null ,
            'deleted_by_user_id'=> $request['deleted_by_user_id'] ?? null ,

        ]);
    }
}
