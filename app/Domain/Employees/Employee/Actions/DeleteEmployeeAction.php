<?php


namespace App\Domain\Employees\Employee\Actions;


use App\Domain\Employees\Employee\DTO\EmployeeDTO;
use App\Domain\Employees\Employee\Model\Employee;

class DeleteEmployeeAction
{
    public static function execute(
        $EmployeeId
    ){
        Employee::find($EmployeeId)->delete();
    }
}
