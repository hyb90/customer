<?php


namespace App\Http\Controllers\Employees\EmployeeLabels;


use App\Helpers\Helpers;
use App\Domain\Employees\EmployeeLabels\Actions\CreateEmployeeLabelAction;
use App\Domain\Employees\EmployeeLabels\Actions\DeleteEmployeeLabelAction;
use App\Domain\Employees\EmployeeLabels\Actions\UpdateEmployeeLabelAction;
use App\Domain\Employees\EmployeeLabels\DTO\EmployeeLabelDTO;
use App\Http\Requests\Employees\EmployeeLabels\CreateEmployeeLabelRequest;
use App\Http\Requests\Employees\EmployeeLabels\UpdateEmployeeLabelRequest;
use App\Http\Requests\Employees\EmployeeLabels\DestroyEmployeeLabelRequest;
use App\Http\Requests\Employees\EmployeeLabels\ShowEmployeeLabelRequest;
use App\Http\Requests\Employees\EmployeeLabels\EditEmployeeLabelRequest;
use App\Http\ViewModels\Employees\EmployeeLabels\ShowEmployeeLabelVM;
use App\Http\ViewModels\Employees\EmployeeLabels\ShowAllEmployeeLabelsVM;

class EmployeeLabelsController
{

    public function index(){
        $EmployeeLabels = new ShowAllEmployeeLabelsVM();
        $response = Helpers::createSuccessResponse($EmployeeLabels->toArray());

        return response()->json($response);
    }

    public function show(ShowEmployeeLabelRequest $showEmployeeLabelRequest){
        $EmployeeLabelDTO = EmployeeLabelDTO::fromRequest($showEmployeeLabelRequest->json()->all());
        $EmployeeLabel = new ShowEmployeeLabelVM($EmployeeLabelDTO->id);
        $response = Helpers::createSuccessResponse($EmployeeLabel->toArray());

        return response()->json($response);
    }

    public function edit(EditEmployeeLabelRequest $editEmployeeLabelRequest){
        $EmployeeLabelDTO = EmployeeLabelDTO::fromRequest($editEmployeeLabelRequest->json()->all());
        $EmployeeLabel = new ShowEmployeeLabelVM($EmployeeLabelDTO->id);
        $response = Helpers::createSuccessResponse($EmployeeLabel->toArray());

        return response()->json($response);
    }

    public function create(CreateEmployeeLabelRequest $createEmployeeLabelRequest){
        $EmployeeLabelDTO = EmployeeLabelDTO::fromRequest($createEmployeeLabelRequest->json()->all());

        $EmployeeLabel = CreateEmployeeLabelAction::execute($EmployeeLabelDTO);

        $EmployeeLabel = new ShowEmployeeLabelVM($EmployeeLabel->id);

        $response = Helpers::createSuccessResponse($EmployeeLabel->toArray());

        return response()->json($response);
    }

    public function update(UpdateEmployeeLabelRequest $updateEmployeeLabelRequest){
        $EmployeeLabelDTO = EmployeeLabelDTO::fromRequest($updateEmployeeLabelRequest->json()->all());

        $EmployeeLabel = UpdateEmployeeLabelAction::execute($EmployeeLabelDTO);

        $EmployeeLabel = new ShowEmployeeLabelVM($EmployeeLabel->id);

        $response = Helpers::createSuccessResponse($EmployeeLabel->toArray());

        return response()->json($response);
    }

    public function destroy(DestroyEmployeeLabelRequest $destroyEmployeeLabelRequest){
        $EmployeeLabelDTO = EmployeeLabelDTO::fromRequest($destroyEmployeeLabelRequest->json()->all());

        $EmployeeLabel = DeleteEmployeeLabelAction::execute($EmployeeLabelDTO);

        $response =Helpers::createSuccessResponse($EmployeeLabel);

        return response()->json($response);
    }

}
