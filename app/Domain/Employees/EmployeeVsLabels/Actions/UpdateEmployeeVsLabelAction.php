<?php


namespace App\Domain\Employees\EmployeeVsLabels\Actions;


use App\Domain\Employees\EmployeeVsLabels\DTO\EmployeeVsLabelDTO;
use App\Domain\Employees\EmployeeVsLabels\Model\EmployeeVsLabel;
use Illuminate\Support\Facades\Auth;

class UpdateEmployeeVsLabelAction
{

    public static function execute(
        EmployeeVsLabelDTO $EmployeeVsLabelDTO
    ){
        $EmployeeVsLabel = EmployeeVsLabel::find($EmployeeVsLabelDTO->id);
        $EmployeeVsLabel->update($EmployeeVsLabelDTO->toArray());
        $EmployeeVsLabel->save();
        return $EmployeeVsLabel;
    }
}
