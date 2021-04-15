<?php


namespace App\Http\ViewModels\Employees\EmployeeLabels;


use App\Domain\Employees\EmployeeLabels\Model\EmployeeLabel;
use Illuminate\Contracts\Support\Arrayable;

class EmployeeLabelsIndexVM implements Arrayable
{

    public function employeeLabels(){
        return EmployeeLabel::all();
    }

    public function toArray()
    {
        return [
            'employee_labels' => $this->employeeLabels(),
        ];
    }
}
