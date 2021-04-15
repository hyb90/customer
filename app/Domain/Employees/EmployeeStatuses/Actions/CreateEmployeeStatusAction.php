<?php


namespace App\Domain\Employees\EmployeeStatuses\Actions;


use App\Domain\Employees\EmployeeStatuses\DTO\EmployeeStatusDTO;
use App\Domain\Employees\EmployeeStatuses\Model\EmployeeStatus;
use Illuminate\Support\Facades\Auth;

class CreateEmployeeStatusAction
{
    public static function execute(
        EmployeeStatusDTO $EmployeeStatusDTO
    ){

        $EmployeeStatus = new EmployeeStatus(array_filter($EmployeeStatusDTO->toArray()));
        $EmployeeStatus->save();
        return $EmployeeStatus ;
    }
}
