<?php


namespace App\Http\ViewModels\Employees\Employee;


use App\Domain\Employees\EmployeeLabels\Model\EmployeeLabel;
use App\Domain\Employees\Employee\Model\Employee;
use App\Domain\Employees\EmployeeVsLabels\Model\EmployeeVsLabel;
use App\Domain\Employees\SalaryTypes\Model\SalaryType;
use App\Models\User;
use Illuminate\Contracts\Support\Arrayable;

class EmployeesEditVM implements Arrayable
{
    /**
     * @var Employee
     */
    private $employee;

    public function __construct($employee_id)
    {
        $this->employee = Employee::find($employee_id);
    }

    public function employee(){
        $this->employee->setAttribute('labels',EmployeeVsLabel::where('employee_id',$this->employee->id)->get());
        return $this->employee;
    }

    public function employeeLabels()
    {
        return EmployeeLabel::all();
    }

//    public function salaryTypes()
//    {
//        return SalaryType::all();
//    }

//    public function employeeDepartments()
//    {
//        return EmployeeDepartment::all();
//    }

    public function toArray()
    {
        return [
            'employee' => $this->employee(),
            'employee_labels' => $this->employeeLabels(),
//            'salary_types' => $this->salaryTypes(),
            'employee_departments' => $this->employeeDepartments(),
        ];
    }
}
