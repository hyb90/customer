<?php


namespace App\Domain\General\Devices\Actions;


use App\Domain\General\Devices\DTO\DeviceDTO;
use App\Domain\General\Devices\Model\Device;

class CreateDeviceAction
{
    public static function execute(
        DeviceDTO $deviceDTO
    ){
        $new_device = new Device($deviceDTO->toArray());

        $new_device->save();
        return $new_device ;
    }
}
