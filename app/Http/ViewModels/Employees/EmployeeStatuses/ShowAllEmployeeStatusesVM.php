<?php


namespace App\Http\ViewModels\Employees\EmployeeStatuses;

use App\Domain\Employees\EmployeeStatuses\Model\EmployeeStatus;
use Illuminate\Contracts\Support\Arrayable;

class ShowAllEmployeeStatusesVM implements Arrayable
{

    private $EmployeeStatuss;

    public function __construct(){

        $this->EmployeeStatuss = array();
        $EmployeeStatuss = EmployeeStatus::all();
        foreach ($EmployeeStatuss as $EmployeeStatus) {
            $one_EmployeeStatus = new ShowEmployeeStatusVM($EmployeeStatus->id);
            array_push($this->EmployeeStatuss,$one_EmployeeStatus->toArray());
        }
    }
    public function toArray()
    {
        return [
            'EmployeeStatuses' => $this->EmployeeStatuss
        ];
    }
}
