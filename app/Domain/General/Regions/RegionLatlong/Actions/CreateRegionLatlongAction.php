<?php


namespace App\Domain\General\Regions\RegionLatlong\Actions;


use App\Domain\General\Regions\RegionLatlong\DTO\RegionLatlongDTO;
use App\Domain\General\Regions\RegionLatlong\Model\RegionLatlong;
use Illuminate\Support\Facades\Auth;

class CreateRegionLatlongAction
{

    public static function execute(
        RegionLatlongDTO $regionLatlongDTO
    ){
        $regionLatlong = new RegionLatlong($regionLatlongDTO->toArray());
//        $regionLatlong->created_by_user_id = Auth::id();
        $regionLatlong->save();
        return $regionLatlong;

    }
}
