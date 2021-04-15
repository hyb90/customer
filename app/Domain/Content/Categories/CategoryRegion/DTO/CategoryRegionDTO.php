<?php


namespace App\Domain\Content\Categories\CategoryRegion\DTO;


use Spatie\DataTransferObject\DataTransferObject;

class CategoryRegionDTO extends DataTransferObject
{
    /* @var integer */
    public $category_id;
    /* @var integer */
    public $region_id;
    /** @var integer|null */
    public $created_by_user_id;
    /** @var integer|null */
    public $updated_by_user_id;
    /** @var integer|null */
    public $deleted_by_user_id;

    public static function fromRequest($request){
        return new self([
            'category_id' => $request['category_id'] ?? null,
            'region_id' => $request['region_id'] ?? null,
            'created_by_user_id' => $request['created_by_user_id'] ?? null,
            'updated_by_user_id' => $request['updated_by_user_id'] ?? null,
            'deleted_by_user_id' => $request['deleted_by_user_id'] ?? null,
        ]);
    }
}
