<?php


namespace App\Http\ViewModels\General\Devices;


use App\Domain\General\Devices\Model\Device;
use Illuminate\Contracts\Support\Arrayable;

class ShowAllDevicesVM implements Arrayable
{
    private $devices;

    public function __construct()
    {
        $this->devices = Device::all();
    }

    public function toArray()
    {
        return [
          'devices' =>  $this->devices
        ];
    }

}
