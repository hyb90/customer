<?php

namespace App\Http\Controllers\Employees\Employee;

use App\Domain\Employees\Employee\Actions\DeleteEmployeeAction;
use App\Domain\Employees\Employee\DTO\EmployeeDTO;
use App\Domain\General\Users\User\Actions\DeleteUserAction;
use App\Domain\General\Users\User\DTO\UserDTO;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Employees\Employee\DestroyEmployeeRequest;
use App\Http\Requests\Employees\Employee\EditEmployeeRequest;
use App\Http\Requests\Employees\Employee\ShowEmployeeRequest;
use App\Http\ViewModels\Employees\Employee\ShowEmployeeVM;
use App\Http\ViewModels\Employees\Employee\EmployeesEditVM;
use App\Http\ViewModels\General\Users\ShowAllUsersVM;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index(){
        $Employee = new ShowAllUsersVM('employees');
        $response = Helpers::createSuccessResponse($Employee->toArray());

        return response()->json($response);
    }

    public function show(ShowEmployeeRequest $showEmployeeRequest){
        $Employee = new ShowEmployeeVM($showEmployeeRequest->json('user_id'));
        $response = Helpers::createSuccessResponse($Employee->toArray());

        return response()->json($response);
    }

    public function edit(EditEmployeeRequest $editEmployeeLabelRequest){
        $EmployeeLabel = new EmployeesEditVM($editEmployeeLabelRequest->json('id'));
        $response = Helpers::createSuccessResponse($EmployeeLabel->toArray());

        return response()->json($response);
    }

    public function update(UpdateEmployeeRequest $updateEmployeeLabelRequest){
        $EmployeeLabelDTO = EmployeeDTO::fromRequest($updateEmployeeLabelRequest->json()->all());

        $EmployeeLabel = UpdateEmployeeAction::execute($EmployeeLabelDTO);

        $EmployeeLabel = new ShowEmployeeVM($EmployeeLabel->id);

        $response = Helpers::createSuccessResponse($EmployeeLabel->toArray());

        return response()->json($response);
    }

    public function destroy(DestroyEmployeeRequest $destroyEmployeeRequest){

        $UserDTO = UserDTO::fromRequest($destroyEmployeeRequest->json()->all());
        $User = DeleteUserAction::execute($UserDTO);
        DeleteEmployeeAction::execute($UserDTO->id);

        $response =Helpers::createSuccessResponse($User);

        return response()->json($response);
    }

}
