<?php


namespace App\Domain\General\Regions\Region\Actions;


use App\Domain\General\Regions\Region\DTO\RegionDTO;
use App\Domain\General\Regions\Region\Model\Region;
use Illuminate\Support\Facades\Auth;

class CreateRegionAction
{

    public static function execute(
        RegionDTO $regionDTO
    ){
        $region = new Region($regionDTO->toArray());
        $region->created_by_user_id = Auth::id();
        $region->save();

        return $region ;
    }
}
