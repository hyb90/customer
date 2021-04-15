<?php


namespace App\Http\Controllers\Employees\EmployeeVsLabels;


use App\Domain\Employees\EmployeeVsLabels\Actions\CreateEmployeeVsLabelAction;
use App\Domain\Employees\EmployeeVsLabels\Actions\DeleteEmployeeVsLabelAction;
use App\Helpers\Helpers;
use App\Domain\Employees\EmployeeVsLabels\DTO\EmployeeVsLabelDTO;
use App\Http\Requests\Employees\EmployeeVsLabels\CreateEmployeeVsLabelRequest;
use App\Http\Requests\Employees\EmployeeVsLabels\DestroyEmployeeVsLabelRequest;
use App\Http\Requests\Employees\EmployeeVsLabels\LabelsOfEmployeeRequest;
use App\Http\Requests\Employees\EmployeeVsLabels\EmployeesOfLabelRequest;
use App\Http\ViewModels\Employees\Employee\ShowEmployeeVM;
use App\Http\ViewModels\Employees\EmployeeVsLabels\ShowAllEmployeeVM;
use App\Http\ViewModels\Employees\EmployeeVsLabels\ShowAllLabelsVM;

class EmployeeVsLabelsController
{

    public function employees_of_label(EmployeesOfLabelRequest $getEmployeesRequest){
        $EmployeeVsLabels = new ShowAllEmployeeVM($getEmployeesRequest->json('employee_label_id'));
        $response = Helpers::createSuccessResponse($EmployeeVsLabels->toArray());

        return response()->json($response);
    }
    public function labels_of_employee(LabelsOfEmployeeRequest $getLabelsRequest){
        $EmployeeVsLabels = new ShowAllLabelsVM($getLabelsRequest->json('employee_id'));
        $response = Helpers::createSuccessResponse($EmployeeVsLabels->toArray());

        return response()->json($response);
    }

    public function create(CreateEmployeeVsLabelRequest $createEmployeeVsLabelRequest){
        $employeeVsLabelDTO = EmployeeVsLabelDTO::fromRequest($createEmployeeVsLabelRequest->json()->all());
        $employeeVsLabel = CreateEmployeeVsLabelAction::execute($employeeVsLabelDTO);

        $employeeVsLabel = new ShowEmployeeVM($employeeVsLabelDTO->employee_id);
        $response = Helpers::createSuccessResponse($employeeVsLabel->toArray());

        return response()->json($response);
    }

    public function destroy(DestroyEmployeeVsLabelRequest $destroyEmployeeVsLabelRequest){
        $employeeVsLabelDTO = EmployeeVsLabelDTO::fromRequest($destroyEmployeeVsLabelRequest->json()->all());
        $employeeVsLabel = DeleteEmployeeVsLabelAction::execute($employeeVsLabelDTO);

        $response = Helpers::createSuccessResponse($employeeVsLabel);

        return response()->json($response);
    }

}
