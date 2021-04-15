<?php


namespace App\Domain\General\Service_regions\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class Service_regionDTO extends DataTransferObject
{
    public $id;
    public $service_id;
    public $region_id;
    public $created_by_user_id;
    public $updated_by_user_id;
    public $deleted_by_user_id;


    public static function fromRequest($request)
    {
        return new self([

            'id' 					                => $request['id'] ?? null ,
            'service_id' 					        => $request['service_id'] ?? null ,
            'region_id' 					        => $request['region_id'] ?? null ,
            'created_by_user_id' 					=> $request['created_by_user_id'] ?? null ,
            'updated_by_user_id' 					=> $request['updated_by_user_id'] ?? null ,
            'deleted_by_user_id' 					=> $request['deleted_by_user_id'] ?? null ,
        ]);
    }
}
