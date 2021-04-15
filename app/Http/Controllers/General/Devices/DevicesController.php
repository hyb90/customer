<?php

namespace App\Http\Controllers\General\Devices;

use App\Domain\General\Devices\Actions\CreateDeviceAction;
use App\Domain\General\Devices\Actions\DeleteDeviceAction;
use App\Domain\General\Devices\Actions\UpdateDeviceAction;
use App\Domain\General\Devices\DTO\DeviceDTO;
use App\Domain\General\Devices\Model\Device;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\General\Device\CreateDeviceRequest;
use App\Http\Requests\General\Device\UpdateDeviceRequest;
use App\Http\ViewModels\General\Devices\ShowAllDevicesVM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DevicesController extends Controller
{
    public function add_device(CreateDeviceRequest $createDeviceRequest){
        $deviceDTO = DeviceDTO::fromRequest($createDeviceRequest->json()->all());
        $device = CreateDeviceAction::execute($deviceDTO);
        $response = Helpers::createSuccessResponse($device->toArray());
        return response()->json($response);
    }

    public function index(){
        $devices = new ShowAllDevicesVM();
        $response = Helpers::createSuccessResponse($devices->toArray());
        return response()->json($response,200);
    }

    public function show(Device $device){

       $response = Helpers::createSuccessResponse($device);
       return response()->json($response);

    }

    public function destory(Device $device){
        $message = DeleteDeviceAction::execute($device);
        $response = Helpers::createSuccessResponse($message);
        return response()->json($response);
    }

    public function update(UpdateDeviceRequest $updateDeviceRequest,Device $device){
        $deviceDTO = DeviceDTO::fromRequest($updateDeviceRequest->json()->all());
        $device = UpdateDeviceAction::execute($device,$deviceDTO);
        $response = Helpers::createSuccessResponse($device);
        return response()->json($response);
    }
}
