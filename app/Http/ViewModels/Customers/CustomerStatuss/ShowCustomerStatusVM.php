<?php


namespace App\Http\ViewModels\Customers\CustomerStatuss;

use App\Domain\Customers\CustomerStatuss\Model\CustomerStatus;
use Illuminate\Contracts\Support\Arrayable;


class ShowCustomerStatusVM implements Arrayable
{

    private $CustomerStatus;

    public function __construct($CustomerStatusId)
    {
        $this->CustomerStatus = CustomerStatus::find($CustomerStatusId) ;
    }
    public function toArray()
    {
        return [
            'CustomerStatus' => $this->CustomerStatus
        ];
    }
}
