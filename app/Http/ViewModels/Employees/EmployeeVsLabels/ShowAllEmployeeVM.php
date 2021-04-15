<?php


namespace App\Http\ViewModels\Employees\EmployeeVsLabels;

use App\Domain\Employees\EmployeeVsLabels\Model\EmployeeVsLabel;
use App\Http\ViewModels\General\Users\ShowAllUsersVM;
use Illuminate\Contracts\Support\Arrayable;

class ShowAllEmployeeVM implements Arrayable
{

    private $employees;

    public function __construct($label_id)
    {
        $this->employees = new ShowAllUsersVM('employees');
    }
    public function toArray()
    {
        return [
            'Employees' => $this->employees->toArray()
        ];
    }
}
