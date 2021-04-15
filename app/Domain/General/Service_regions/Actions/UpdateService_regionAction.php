<?php


namespace App\Domain\General\Service_regions\Actions;


use App\Domain\General\Service_regions\DTO\Service_regionDTO;
use App\Domain\General\Service_regions\Model\Service_region;
use Illuminate\Support\Facades\Auth;

class UpdateService_regionAction
{

    public static function execute(
        Service_regionDTO $Service_regionDTO
    ){
        $Service_region = Service_region::find($Service_regionDTO->id);
        $Service_region->update($Service_regionDTO->toArray());
        $Service_region->updated_by_user_id = Auth::id();
        $Service_region->save();
        return $Service_region;
    }
}
