<?php


namespace App\Domain\General\Services\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class ServiceDTO extends DataTransferObject
{
    public $id;
    public $verified_by_user_id;
    public $created_by_user_id;
    public $updated_by_user_id;
    public $deleted_by_user_id;


    public static function fromRequest($request)
    {
        return new self([
            'id'                    => $request['id'] ?? null,
            'verified_by_user_id'   => $request['verified_by_user_id'] ?? null,
            'created_by_user_id'    => $request['created_by_user_id'] ?? null,
            'updated_by_user_id'    => $request['updated_by_user_id'] ?? null,
            'deleted_by_user_id'    => $request['deleted_by_user_id'] ?? null,

        ]);
    }
}
