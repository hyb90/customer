<?php


namespace App\Domain\General\ServiceTranslations\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class ServiceTranslationDTO extends DataTransferObject
{
    public $id;
	public $service_id;
	public $translation_lang_id;
	public $name;
	public $description;
	public $created_by_user_id;
	public $updated_by_user_id;
	public $deleted_by_user_id;


    public static function fromRequest($request)
    {
        return new self([
            'id'                            => $request['id'] ?? null,
			'service_id' 					=> $request['service_id'] ?? null ,
			'translation_lang_id' 			=> $request['translation_lang_id'] ?? null ,
			'name' 					        => $request['name'] ?? null ,
			'description' 					=> $request['description'] ?? null ,
			'created_by_user_id' 			=> $request['created_by_user_id'] ?? null ,
			'updated_by_user_id' 			=> $request['updated_by_user_id'] ?? null ,
			'deleted_by_user_id' 			=> $request['deleted_by_user_id'] ?? null ,


        ]);
    }
}
