<?php


namespace App\Domain\Employees\EmployeeLabels\Actions;


use App\Domain\Employees\EmployeeLabels\DTO\EmployeeLabelDTO;
use App\Domain\Employees\EmployeeLabels\Model\EmployeeLabel;
use Illuminate\Support\Facades\Auth;

class DeleteEmployeeLabelAction
{
    public static function execute(
        EmployeeLabelDTO $EmployeeLabelDTO
    ){

        $EmployeeLabel = EmployeeLabel::find($EmployeeLabelDTO->id);
        $EmployeeLabel->update($EmployeeLabelDTO->toArray());
        $EmployeeLabel->save();
        $EmployeeLabel->delete();
        return "deleted successfully.";
    }
}
