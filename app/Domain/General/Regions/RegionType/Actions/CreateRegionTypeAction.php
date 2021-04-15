<?php


namespace App\Domain\General\Regions\RegionType\Actions;


use App\Domain\General\Regions\RegionType\DTO\RegionTypeDTO;
use App\Domain\General\Regions\RegionType\Model\RegionType;
use Illuminate\Support\Facades\Auth;

class CreateRegionTypeAction
{

    public static function execute(
        RegionTypeDTO $regionTypeDTO
    ){
        $regionType = new RegionType($regionTypeDTO->toArray());
        $regionType->created_by_user_id = Auth::id();
        $regionType->save();

        return $regionType ;
    }
}
