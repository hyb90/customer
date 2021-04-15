<?php


namespace App\Http\ViewModels\Employees\EmployeeLabels;

use App\Domain\Employees\EmployeeLabels\Model\EmployeeLabel;
use Illuminate\Contracts\Support\Arrayable;

class ShowAllEmployeeLabelsVM implements Arrayable
{

    private $EmployeeLabels;

    public function __construct(){

        $this->EmployeeLabels = array();
        $EmployeeLabels = EmployeeLabel::all();
        foreach ($EmployeeLabels as $EmployeeLabel) {
            $one_EmployeeLabel = new ShowEmployeeLabelVM($EmployeeLabel->id);
            array_push($this->EmployeeLabels,$one_EmployeeLabel->toArray());
        }
    }
    public function toArray()
    {
        return [
            'Employee_Labels' => $this->EmployeeLabels
        ];
    }
}
