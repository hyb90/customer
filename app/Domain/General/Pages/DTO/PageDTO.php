<?php


namespace App\Domain\General\Pages\DTO;


use Spatie\DataTransferObject\DataTransferObject;

class PageDTO extends DataTransferObject
{
    /* @var string */
    public $name;
    /* @var string */
    public $endpoint;
    /* @var integer|null */
    public $created_by_user_id;
    /* @var integer|null */
    public $updated_by_user_id;
    /* @var integer|null */
    public $deleted_by_user_id;

    public static function fromRequest($request){
        return new self([
            'name'      => $request['name'] ?? null,
            'endpoint'  => $request['endpoint'] ?? null,
            'created_by_user_id' => $request['created_by_user_id'] ?? null,
            'updated_by_user_id' => $request['updated_by_user_id'] ?? null,
            'deleted_by_user_id' => $request['deleted_by_user_id'] ?? null,
        ]);
    }
}
