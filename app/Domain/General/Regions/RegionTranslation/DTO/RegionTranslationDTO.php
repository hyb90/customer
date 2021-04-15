<?php


namespace App\Domain\General\Regions\RegionTranslation\DTO;


use Spatie\DataTransferObject\DataTransferObject;

class RegionTranslationDTO extends DataTransferObject
{
    /* @var integer */
    public $region_id ;
    /* @var integer */
    public $translation_lang_id  ;
    /* @var string */
    public $region_name ;
    /* @var string|null */
    public $region_description ;
    /* @var integer|null */
    public $created_by_user_id;
    /* @var integer|null */
    public $updated_by_user_id;
    /* @var integer|null */
    public $deleted_by_user_id;

    public static function fromRequest($request){
        return new self([
            'region_id'             => $request['region_id'] ?? null,
            'translation_lang_id'   => $request['translation_lang_id'] ?? null,
            'region_name'           => $request['region_name'] ?? null,
            'region_description'    => $request['region_description'] ?? null,
            'created_by_user_id'    => $request['created_by_user_id'] ?? null,
            'updated_by_user_id'    => $request['updated_by_user_id'] ?? null,
            'deleted_by_user_id'    => $request['deleted_by_user_id'] ?? null,
        ]);
    }
}
