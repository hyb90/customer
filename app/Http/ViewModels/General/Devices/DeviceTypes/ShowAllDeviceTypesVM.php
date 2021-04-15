<?php


namespace App\Http\ViewModels\General\Devices\DeviceTypes;


use App\Domain\General\DeviceType\Model\DeviceType;
use Illuminate\Contracts\Support\Arrayable;

class ShowAllDeviceTypesVM implements Arrayable
{
    private $deviceTypes;

    public function __construct()
    {
        $this->deviceTypes = DeviceType::all();
    }

    public function toArray()
    {
        return [
            'device types' => $this->deviceTypes
        ];
    }

}
