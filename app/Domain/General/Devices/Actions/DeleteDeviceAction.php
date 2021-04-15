<?php


namespace App\Domain\General\Devices\Actions;


use App\Domain\General\Devices\Model\Device;
use Illuminate\Support\Facades\Auth;

class DeleteDeviceAction
{
    public static function execute(
        Device $device
    ){
        $device->deleted_by_user_id = Auth::id();
        $device->save();
        $device->delete();
        return "deleted successfully." ;
    }
}
