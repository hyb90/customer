<?php


namespace App\Domain\Managing\Configs\DTO;


use Spatie\DataTransferObject\DataTransferObject;

class ConfigsDTO extends DataTransferObject
{

    public $created_by_user_id;
    public $updated_by_user_id;
    public $deleted_by_user_id;

    public static function fromRequest($request){
        return new self([

            'created_by_user_id' => $request['created_by_user_id'] ?? null,
            'updated_by_user_id' => $request['updated_by_user_id'] ?? null,
            'deleted_by_user_id' => $request['deleted_by_user_id'] ?? null,
        ]);
    }

}
