<?php


namespace App\Domain\General\Users\UserResions\DTO;


use Spatie\DataTransferObject\DataTransferObject;

class UserRegionDTO extends DataTransferObject
{
    public $user_id;
    public $region_id;
    public $ip;

    public static function fromRequest($request){

        return new self([
            'user_id'           => $request['user_id'] ?? null,
            'region_id'         => $request['region_id'] ?? null,
            'ip'                => $request['ip'] ?? null,
        ]);
    }
}
