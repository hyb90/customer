<?php


namespace App\Domain\General\Service_regions\Actions;


use App\Domain\General\Service_regions\DTO\Service_regionDTO;
use App\Domain\General\Service_regions\Model\Service_region;

class CreateService_regionAction
{
    public static function execute(
        Service_regionDTO $Service_regionDTO
    ){

        $Service_region = new Service_region($Service_regionDTO->toArray());
        $Service_region->save();
        return $Service_region ;
    }
}
