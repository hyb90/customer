<?php


namespace App\Domain\General\Regions\RegionTypeTranslation\DTO;


use Spatie\DataTransferObject\DataTransferObject;

class  RegionTypeTranslationDTO extends DataTransferObject
{

    /* @var integer */
    public $region_type_id ;
    /* @var integer */
    public $translation_lang_id  ;
    /* @var string */
    public $region_type_name ;
    /* @var integer|null */
    public $created_by_user_id;
    /* @var integer|null */
    public $updated_by_user_id;
    /* @var integer|null */
    public $deleted_by_user_id;

    public static function fromRequest($request){
        return new self([
            'region_type_id'        => $request['region_type_id'] ?? null,
            'translation_lang_id'   => $request['translation_lang_id'] ?? null,
            'region_type_name'      => $request['region_type_name'] ?? null,
            'created_by_user_id'    => $request['created_by_user_id'] ?? null,
            'updated_by_user_id'    => $request['updated_by_user_id'] ?? null,
            'deleted_by_user_id'    => $request['deleted_by_user_id'] ?? null,
            ]);
    }
}
