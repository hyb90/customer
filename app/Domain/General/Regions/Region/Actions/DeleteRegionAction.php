<?php


namespace App\Domain\General\Regions\Region\Actions;


use App\Domain\General\Regions\Region\Model\Region;
use Illuminate\Support\Facades\Auth;

class DeleteRegionAction
{
    public static function execute(
        Region $region
    ){
        $region->deleted_by_user_id = Auth::id();
        $region->save();
        $region->delete();
        return $region;
    }
}
