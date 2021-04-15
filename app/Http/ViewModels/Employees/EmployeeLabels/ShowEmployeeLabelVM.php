<?php


namespace App\Http\ViewModels\Employees\EmployeeLabels;

use App\Domain\Employees\EmployeeLabels\Model\EmployeeLabel;
use Illuminate\Contracts\Support\Arrayable;


class ShowEmployeeLabelVM implements Arrayable
{

    private $EmployeeLabel;

    public function __construct($EmployeeLabelId)
    {
        $this->EmployeeLabel = EmployeeLabel::find($EmployeeLabelId) ;
    }
    public function toArray()
    {
        return [
            'EmployeeLabel' => $this->EmployeeLabel
        ];
    }
}
