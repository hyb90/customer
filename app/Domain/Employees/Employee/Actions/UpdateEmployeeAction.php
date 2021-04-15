<?php


namespace App\Domain\Employees\Employee\Actions;


use App\Domain\Employees\Employee\DTO\EmployeeDTO;
use App\Domain\Employees\Employee\Model\Employee;

class UpdateEmployeeAction
{
    public static function execute(
        EmployeeDTO $employeeDTO
    ){
        $employee = Employee::find($employeeDTO->id);
        $employee->update($employeeDTO->toArray());
        $employee->save();
        return $employee;
    }
}
