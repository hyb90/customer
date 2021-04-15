<?php

namespace App\Http\Controllers\General\Devices;

use App\Domain\General\DeviceType\Actions\CreateDeviceTypeAction;
use App\Domain\General\DeviceType\Actions\DeleteDeviceTypeAction;
use App\Domain\General\DeviceType\Actions\UpdateDeviceTypeAction;
use App\Domain\General\DeviceType\DTO\DeviceTypeDTO;
use App\Domain\General\DeviceType\Model\DeviceType;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\General\Device\DeviceTypes\CreateDeviceTypeRequest;
use App\Http\Requests\General\Device\DeviceTypes\UpdateDeviceTypeRequest;
use App\Http\ViewModels\General\Devices\DeviceTypes\ShowAllDeviceTypesVM;
use Illuminate\Http\Request;

class DeviceTypesController extends Controller
{
    public function add_device(CreateDeviceTypeRequest $createDeviceTypeRequest){
        $deviceTypeDTO = DeviceTypeDTO::fromRequest($createDeviceTypeRequest->json()->all());
        $deviceType = CreateDeviceTypeAction::execute($deviceTypeDTO);
        $response = Helpers::createSuccessResponse($deviceType->toArray());
        return response()->json($response);
    }

    public function index(){
        $devices = new ShowAllDeviceTypesVM();
        $response = Helpers::createSuccessResponse($devices->toArray());
        return response()->json($response,200);
    }

    public function show(DeviceType $deviceType){

        $response = Helpers::createSuccessResponse($deviceType);
        return response()->json($response);

    }

    public function destory(DeviceType $device){
        $message = DeleteDeviceTypeAction::execute($device);
        $response = Helpers::createSuccessResponse($message);
        return response()->json($response);
    }

    public function update(UpdateDeviceTypeRequest $updateDeviceTypeRequest,DeviceType $deviceType){
        $deviceTypeDTO = DeviceTypeDTO::fromRequest($updateDeviceTypeRequest->json()->all());
        $deviceType = UpdateDeviceTypeAction::execute($deviceTypeDTO);
        $response = Helpers::createSuccessResponse($deviceType);
        return response()->json($response);
    }
}
