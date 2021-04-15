<?php


namespace App\Domain\General\DeviceType\Actions;


use App\Domain\General\DeviceType\DTO\DeviceTypeDTO;
use App\Domain\General\DeviceType\Model\DeviceType;
use Illuminate\Support\Facades\Auth;

class UpdateDeviceTypeAction
{

    public static function execute(
        DeviceTypeDTO $deviceTypeDTO
    ){
        $deviceType = DeviceType::find($deviceTypeDTO->id);
        $deviceType->update($deviceTypeDTO->toArray());
        $deviceType->updated_by_user_id = Auth::id();
        $deviceType->save();
        return $deviceType;
    }
}
