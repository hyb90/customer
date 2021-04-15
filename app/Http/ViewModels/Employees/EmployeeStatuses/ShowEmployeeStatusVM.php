<?php


namespace App\Http\ViewModels\Employees\EmployeeStatuses;

use App\Domain\Employees\EmployeeStatuses\Model\EmployeeStatus;
use Illuminate\Contracts\Support\Arrayable;


class ShowEmployeeStatusVM implements Arrayable
{

    private $EmployeeStatus;

    public function __construct($EmployeeStatusId)
    {
        $this->EmployeeStatus = EmployeeStatus::find($EmployeeStatusId) ;
    }
    public function toArray()
    {
        return [
            'EmployeeStatus' => $this->EmployeeStatus
        ];
    }
}
