<?php


namespace App\Domain\General\Regions\Region\Actions;


use App\Domain\General\Regions\Region\DTO\RegionDTO;
use App\Domain\General\Regions\Region\Model\Region;
use Illuminate\Support\Facades\Auth;

class UpdateRegionAction
{
    public static function execute(
        Region $region,
        RegionDTO $regionDTO
    ){
        $region->update($regionDTO->toArray());
        $region->updated_by_user_id = Auth::id();
        $region->save();

        return $region ;
    }
}
