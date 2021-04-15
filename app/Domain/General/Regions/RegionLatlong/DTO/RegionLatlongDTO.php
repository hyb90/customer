<?php


namespace App\Domain\General\Regions\RegionLatlong\DTO;


use Spatie\DataTransferObject\DataTransferObject;

class RegionLatlongDTO extends DataTransferObject
{
    /* @var double|integer */
    public $region_lat;
    /* @var double|integer */
    public $region_long;
    /* @var integer */
    public $region_id;

    public static function fromRequest($request){
        return new self([
            'region_lat' => $request['region_lat'] ?? null,
            'region_long' => $request['region_long'] ?? null,
            'region_id' => $request['region_id'] ?? null,
        ]);
    }

}
