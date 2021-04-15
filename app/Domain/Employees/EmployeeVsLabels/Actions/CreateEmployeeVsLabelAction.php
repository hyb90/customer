<?php


namespace App\Domain\Employees\EmployeeVsLabels\Actions;


use App\Domain\Employees\EmployeeVsLabels\DTO\EmployeeVsLabelDTO;
use App\Domain\Employees\EmployeeVsLabels\Model\EmployeeVsLabel;
use Illuminate\Support\Facades\Auth;

class CreateEmployeeVsLabelAction
{
    public static function execute(
        EmployeeVsLabelDTO $EmployeeVsLabelDTO
    ){

        $EmployeeVsLabel = new EmployeeVsLabel($EmployeeVsLabelDTO->toArray());
        $EmployeeVsLabel->save();
        return $EmployeeVsLabel ;
    }
}
