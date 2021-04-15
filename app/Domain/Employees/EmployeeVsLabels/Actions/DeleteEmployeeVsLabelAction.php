<?php


namespace App\Domain\Employees\EmployeeVsLabels\Actions;


use App\Domain\Employees\EmployeeVsLabels\DTO\EmployeeVsLabelDTO;
use App\Domain\Employees\EmployeeVsLabels\Model\EmployeeVsLabel;
use Illuminate\Support\Facades\Auth;

class DeleteEmployeeVsLabelAction
{
    public static function execute(
        EmployeeVsLabelDTO $EmployeeVsLabelDTO
    ){

        $EmployeeVsLabel = EmployeeVsLabel::find($EmployeeVsLabelDTO->id);
        $EmployeeVsLabel->update(array_filter($EmployeeVsLabelDTO->toArray()));
        $EmployeeVsLabel->save();
        $EmployeeVsLabel->delete();
        return "deleted successfully.";
    }
}
