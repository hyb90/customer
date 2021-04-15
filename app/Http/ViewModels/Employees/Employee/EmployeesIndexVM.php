<?php


namespace App\Http\ViewModels\Employees\Employee;


use App\Domain\Employees\Employee\Model\Employee;
use Illuminate\Contracts\Support\Arrayable;

class EmployeesIndexVM implements Arrayable
{

    public function employees(){
        return Employee::all();
    }

    public function toArray()
    {
        return [
            'employees' => $this->employees(),
        ];
    }
}
