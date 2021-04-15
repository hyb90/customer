<?php


namespace App\Domain\General\DeviceType\Actions;


use App\Domain\General\DeviceType\DTO\DeviceTypeDTO;
use App\Domain\General\DeviceType\Model\DeviceType;
use Illuminate\Support\Facades\Auth;

class CreateDeviceTypeAction
{

    public static function execute(
        DeviceTypeDTO $deviceTypeDTO
    ){
        $deviceType = new DeviceType($deviceTypeDTO->toArray());
        $deviceType->created_by_user_id = Auth::id();
        $deviceType->save();
        return $deviceType;
    }
}
