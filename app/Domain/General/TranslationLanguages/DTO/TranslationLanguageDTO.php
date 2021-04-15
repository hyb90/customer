<?php


namespace App\Domain\General\TranslationLanguages\DTO;


use Spatie\DataTransferObject\DataTransferObject;

class TranslationLanguageDTO extends DataTransferObject
{

    /* @var string*/
    public $name;
    /* @var string*/
    public $language_code;
    /* @var string|null*/
    public $name_in_native_language;
    /* @var integer|null */
    public $is_default;
    /** @var string|null */
    public $created_by_user_id;
    /** @var string|null */
    public $updated_by_user_id;
    /** @var string|null */
    public $deleted_by_user_id;

    public static function fromRequest($request){
        return new self([
            'name' => $request['name'] ?? null,
            'language_code' => $request['language_code'] ?? null,
            'name_in_native_language' => $request['name_in_native_language'] ?? null,
            'is_default' => $request['is_default'] ?? null,
            'created_by_user_id'=> $request['created_by_user_id'] ?? null,
            'updated_by_user_id'=> $request['updated_by_user_id'] ?? null,
            'deleted_by_user_id'=> $request['deleted_by_user_id'] ?? null,
        ]);
    }
}
