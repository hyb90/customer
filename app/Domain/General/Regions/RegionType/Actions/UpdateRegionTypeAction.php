<?php


namespace App\Domain\General\Regions\RegionType\Actions;


use App\Domain\General\Regions\RegionType\DTO\RegionTypeDTO;
use App\Domain\General\Regions\RegionType\Model\RegionType;
use Illuminate\Support\Facades\Auth;

class UpdateRegionTypeAction
{
    public static function execute(
        RegionType $regionType,
        RegionTypeDTO $regionTypeDTO
    ){
        $regionType->update($regionTypeDTO->toArray());
        $regionType->updated_by_user_id = Auth::id();
        $regionType->save();

        return $regionType ;
    }
}
