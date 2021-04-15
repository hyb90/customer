<?php


namespace App\Http\ViewModels\Employees\Employee;


use App\Domain\Employees\Employee\Model\Employee;
use App\Domain\Employees\EmployeeVsLabels\Model\EmployeeVsLabel;
use App\Models\User;
use Illuminate\Contracts\Support\Arrayable;

class ShowEmployeeVM implements Arrayable
{
    private $user;

    public function __construct($employee_id)
    {
        $this->user = User::find($employee_id);
        $employee = Employee::find($employee_id);
        $employee_labels = EmployeeVsLabel::where('employee_id',$employee_id)->get();
        $this->user->setAttribute('employee data' , $employee);
        $this->user->setAttribute('employee labels' , $employee_labels);
    }

    public function toArray()
    {
        return[
            'employee' =>  $this->user
        ];
    }
}
