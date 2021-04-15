<?php


namespace App\Domain\Employees\EmployeeStatuses\Actions;


use App\Domain\Employees\EmployeeStatuses\DTO\EmployeeStatusDTO;
use App\Domain\Employees\EmployeeStatuses\Model\EmployeeStatus;
use Illuminate\Support\Facades\Auth;

class DeleteEmployeeStatusAction
{
    public static function execute(
        EmployeeStatusDTO   $EmployeeStatusDTO
    ){

        $EmployeeStatus = EmployeeStatus::find($EmployeeStatusDTO->id);
        $EmployeeStatus->update(array_filter($EmployeeStatusDTO->toArray()));
        $EmployeeStatus->save();
        $EmployeeStatus->delete();
        return "deleted successfully.";
    }
}
