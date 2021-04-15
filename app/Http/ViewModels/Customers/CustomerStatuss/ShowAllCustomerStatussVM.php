<?php


namespace App\Http\ViewModels\Customers\CustomerStatuss;

use App\Domain\Customers\CustomerStatuss\Model\CustomerStatus;
use Illuminate\Contracts\Support\Arrayable;

class ShowAllCustomerStatussVM implements Arrayable
{

    private $CustomerStatuses;

    public function __construct(){

        $this->CustomerStatuses = array();
        $CustomerStatuses = CustomerStatus::all();
        foreach ($CustomerStatuses as $CustomerStatus) {
            $one_CustomerStatus = new ShowCustomerStatusVM($CustomerStatus->id);
            array_push($this->CustomerStatuses,$one_CustomerStatus->toArray());
        }
    }
    public function toArray()
    {
        return [
            'CustomerStatuses' => $this->CustomerStatuses
        ];
    }
}
