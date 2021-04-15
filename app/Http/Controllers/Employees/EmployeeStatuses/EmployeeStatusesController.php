<?php


namespace App\Http\Controllers\Employees\EmployeeStatuses;


use App\Helpers\Helpers;
use App\Domain\Employees\EmployeeStatuses\Actions\CreateEmployeeStatusAction;
use App\Domain\Employees\EmployeeStatuses\Actions\DeleteEmployeeStatusAction;
use App\Domain\Employees\EmployeeStatuses\Actions\UpdateEmployeeStatusAction;
use App\Domain\Employees\EmployeeStatuses\DTO\EmployeeStatusDTO;
use App\Http\Requests\Employees\EmployeeStatuses\CreateEmployeeStatusRequest;
use App\Http\Requests\Employees\EmployeeStatuses\UpdateEmployeeStatusRequest;
use App\Http\Requests\Employees\EmployeeStatuses\DestroyEmployeeStatusRequest;
use App\Http\Requests\Employees\EmployeeStatuses\ShowEmployeeStatusRequest;
use App\Http\Requests\Employees\EmployeeStatuses\EditEmployeeStatusRequest;
use App\Http\ViewModels\Employees\EmployeeStatuses\ShowEmployeeStatusVM;
use App\Http\ViewModels\Employees\EmployeeStatuses\ShowAllEmployeeStatusesVM;

class EmployeeStatusesController
{

    public function index(){
        $EmployeeStatuses = new ShowAllEmployeeStatusesVM();
        $response = Helpers::createSuccessResponse($EmployeeStatuses->toArray());

        return response()->json($response);
    }

    public function show(ShowEmployeeStatusRequest $showEmployeeStatusRequest){
        $EmployeeStatusDTO = EmployeeStatusDTO::fromRequest($showEmployeeStatusRequest->json()->all());
        $EmployeeStatus = new ShowEmployeeStatusVM($EmployeeStatusDTO->id);
        $response = Helpers::createSuccessResponse($EmployeeStatus->toArray());

        return response()->json($response);
    }

    public function edit(EditEmployeeStatusRequest $editEmployeeStatusRequest){
        $EmployeeStatusDTO = EmployeeStatusDTO::fromRequest($editEmployeeStatusRequest->json()->all());
        $EmployeeStatus = new ShowEmployeeStatusVM($EmployeeStatusDTO->id);
        $response = Helpers::createSuccessResponse($EmployeeStatus->toArray());

        return response()->json($response);
    }

    public function create(CreateEmployeeStatusRequest $createEmployeeStatusRequest){
        $EmployeeStatusDTO = EmployeeStatusDTO::fromRequest($createEmployeeStatusRequest->json()->all());

        $EmployeeStatus = CreateEmployeeStatusAction::execute($EmployeeStatusDTO);

        $EmployeeStatus = new ShowEmployeeStatusVM($EmployeeStatus->id);

        $response = Helpers::createSuccessResponse($EmployeeStatus->toArray());

        return response()->json($response);
    }

    public function update(UpdateEmployeeStatusRequest $updateEmployeeStatusRequest){
        $EmployeeStatusDTO = EmployeeStatusDTO::fromRequest($updateEmployeeStatusRequest->json()->all());

        $EmployeeStatus = UpdateEmployeeStatusAction::execute($EmployeeStatusDTO);

        $EmployeeStatus = new ShowEmployeeStatusVM($EmployeeStatus->id);

        $response = Helpers::createSuccessResponse($EmployeeStatus->toArray());

        return response()->json($response);
    }

    public function destroy(DestroyEmployeeStatusRequest $destroyEmployeeStatusRequest){
        $EmployeeStatusDTO = EmployeeStatusDTO::fromRequest($destroyEmployeeStatusRequest->json()->all());

        $EmployeeStatus = DeleteEmployeeStatusAction::execute($EmployeeStatusDTO);

        $response =Helpers::createSuccessResponse($EmployeeStatus);

        return response()->json($response);
    }

}
