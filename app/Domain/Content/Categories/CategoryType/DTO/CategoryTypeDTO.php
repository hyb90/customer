<?php

namespace App\Domain\Content\Categories\CategoryType\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class CategoryTypeDTO extends DataTransferObject
{
    /** @var string */
    public $category_type_name_ar;
    /** @var string | null */
    public $category_type_name_en;
    /** @var string|null */
    public $created_by_user_id;
    /** @var string|null */
    public $updated_by_user_id;
    /** @var string|null */
    public $deleted_by_user_id;
    public static function fromRequest($request)
    {
        return new self([
            'category_type_name_ar'=> $request->json('category_type_name_ar'),
            'category_type_name_en'=> $request->json('category_type_name_en'),
            'created_by_user_id'=> $request->json('created_by_user_id'),
            'updated_by_user_id'=> $request->json('updated_by_user_id'),
            'deleted_by_user_id'=> $request->json('deleted_by_user_id'),
        ]);

    }
}
