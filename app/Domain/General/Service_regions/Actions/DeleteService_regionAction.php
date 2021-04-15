<?php


namespace App\Domain\General\Service_regions\Actions;


use App\Domain\General\Service_regions\DTO\Service_regionDTO;
use App\Domain\General\Service_regions\Model\Service_region;
use Illuminate\Support\Facades\Auth;

class DeleteService_regionAction
{
    public static function execute(
        $Service_regionId
    ){

        $Service_region = Service_region::find($Service_regionId);
        $Service_region->delete();
        return "deleted successfully.";
    }
}
