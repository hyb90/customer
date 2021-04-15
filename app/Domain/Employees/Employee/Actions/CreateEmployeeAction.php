<?php


namespace App\Domain\Employees\Employee\Actions;


use App\Domain\Employees\Employee\DTO\EmployeeDTO;
use App\Domain\Employees\Employee\Model\Employee;

class CreateEmployeeAction
{

    public static function execute(
        EmployeeDTO $employeeDTO
    ){
        $employee = new Employee($employeeDTO->toArray());
        $employee->save();
        return $employee;
    }
}
