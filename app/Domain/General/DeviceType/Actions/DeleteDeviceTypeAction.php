<?php


namespace App\Domain\General\DeviceType\Actions;


use App\Domain\General\DeviceType\DTO\DeviceTypeDTO;
use App\Domain\General\DeviceType\Model\DeviceType;
use Illuminate\Support\Facades\Auth;

class DeleteDeviceTypeAction
{

    public static function execute(
        DeviceType $deviceType
    ){
        $deviceType->deleted_by_user_id = Auth::id();
        $deviceType->save();
        $deviceType->delete();
        return 'deleted_successfully.';
    }
}
