<?php


namespace App\Domain\Content\Categories\CategoryTranslation\DTO;


use Spatie\DataTransferObject\DataTransferObject;

class CategoryTranslationDTO extends DataTransferObject
{
    /* @var integer */
    public $category_id ;
    /* @var integer */
    public $translation_lang_id  ;
    /* @var string */
    public $category_name ;
    /** @var integer|null */
    public $created_by_user_id;
    /** @var integer|null */
    public $updated_by_user_id;
    /** @var integer|null */
    public $deleted_by_user_id;
    public static function fromRequest($request){
        return new self([
            'category_id'           => $request['category_id'] ?? null,
            'translation_lang_id'   => $request['translation_lang_id'] ?? null,
            'category_name'         => $request['category_name'] ?? null,
            'created_by_user_id'=> $request['created_by_user_id'] ?? null,
            'updated_by_user_id'=> $request['updated_by_user_id'] ?? null,
            'deleted_by_user_id'=> $request['deleted_by_user_id'] ?? null,
        ]);
    }

}
