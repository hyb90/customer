<?php


namespace App\Http\ViewModels\Employees\Employee;


use App\Domain\Employees\EmployeeLabels\Model\EmployeeLabel;
use App\Domain\Employees\SalaryTypes\Model\SalaryType;
use Illuminate\Contracts\Support\Arrayable;

class EmployeesCreateVM implements Arrayable
{

    public function employeeLabels()
    {
        return EmployeeLabel::all();
    }

    public function salaryTypes()
    {
        return SalaryType::all();
    }

//    public function employeeDepartments()
//    {
//        return EmployeeDepartment::all();
//    }

    public function toArray()
    {
        return [
            'employee_labels' => $this->employeeLabels(),
            'salary_types' => $this->salaryTypes(),
//            'employee_departments' => $this->employeeDepartments(),
        ];
    }
}
