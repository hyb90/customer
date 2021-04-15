<?php


namespace App\Domain\Content\Categories\CategoryPages\DTO;


use Spatie\DataTransferObject\DataTransferObject;

class CategoryPageDTO extends DataTransferObject
{

    public $id;
    public $category_id;
    public $page_id;
    public $created_by_user_id;
    public $updated_by_user_id;
    public $deleted_by_user_id;


    public static function fromRequest($request){
        return new self([
            'id' => $request['id'] ?? null ,
            'category_id' => $request['category_id'] ?? null ,
            'page_id' => $request['page_id'] ?? null ,
            'created_by_user_id' => $request['created_by_user_id'] ?? null ,
            'updated_by_user_id' => $request['updated_by_user_id'] ?? null ,
            'deleted_by_user_id' => $request['deleted_by_user_id'] ?? null ,
        ]);
    }
}
