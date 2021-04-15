<?php


namespace App\Domain\General\Devices\Actions;


use App\Domain\General\Devices\DTO\DeviceDTO;
use App\Domain\General\Devices\Model\Device;
use Illuminate\Support\Facades\Auth;

class UpdateDeviceAction
{
    public static function execute(
        Device $device,
        DeviceDTO $deviceDTO
    ){
        $device->update($deviceDTO->toArray());
        $device->updated_by_user_id = Auth::id();
        $device->save();
        return $device;
    }
}
