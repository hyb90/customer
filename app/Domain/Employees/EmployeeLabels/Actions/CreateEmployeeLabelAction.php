<?php


namespace App\Domain\Employees\EmployeeLabels\Actions;


use App\Domain\Employees\EmployeeLabels\DTO\EmployeeLabelDTO;
use App\Domain\Employees\EmployeeLabels\Model\EmployeeLabel;
use Illuminate\Support\Facades\Auth;

class CreateEmployeeLabelAction
{
    public static function execute(
        EmployeeLabelDTO $EmployeeLabelDTO
    ){

        $EmployeeLabel = new EmployeeLabel($EmployeeLabelDTO->toArray());
        $EmployeeLabel->save();
        return $EmployeeLabel ;
    }
}
