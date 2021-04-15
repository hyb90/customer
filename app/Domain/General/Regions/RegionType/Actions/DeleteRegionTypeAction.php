<?php


namespace App\Domain\General\Regions\RegionType\Actions;


use App\Domain\General\Regions\RegionType\Model\RegionType;
use Illuminate\Support\Facades\Auth;

class DeleteRegionTypeAction
{
    public static function execute(
        RegionType $regionType
    ){
        $regionType->deleted_by_user_id = Auth::id();
        $regionType->save();
        $regionType->delete();
        return $regionType ;
    }
}
