<?php

namespace App\Domain\Content\Categories\Category2Category\DTO;

use phpseclib\Math\BigInteger;
use Spatie\DataTransferObject\DataTransferObject;

class Category2CategoryDTO extends DataTransferObject
{

    /** @var integer */
    public $parent_id;
    /** @var integer */
    public $son_id;
    /** @var integer|null */
    public $created_by_user_id;
    /** @var integer|null */
    public $updated_by_user_id;
    /** @var integer|null */
    public $deleted_by_user_id;

    public static function fromRequest($request)
    {
        return new self([
            'parent_id'=> $request['parent_id'] ?? null ,
            'son_id'=> $request['son_id'] ?? null ,
            'created_by_user_id'=> $request['created_by_user_id'] ?? null ,
            'updated_by_user_id'=> $request['updated_by_user_id'] ?? null ,
            'deleted_by_user_id'=> $request['deleted_by_user_id'] ?? null ,
        ]);

    }
}
