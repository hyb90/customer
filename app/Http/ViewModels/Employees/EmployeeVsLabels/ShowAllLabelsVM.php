<?php


namespace App\Http\ViewModels\Employees\EmployeeVsLabels;

use App\Domain\Employees\EmployeeVsLabels\Model\EmployeeVsLabel;
use Illuminate\Contracts\Support\Arrayable;


class ShowAllLabelsVM implements Arrayable
{

    private $Labels;

    public function __construct($EmployeeId)
    {
        $this->Labels = EmployeeVsLabel::where('employee_id',$EmployeeId)->get();
    }
    public function toArray()
    {
        return [
            'Labels' => $this->Labels
        ];
    }
}
