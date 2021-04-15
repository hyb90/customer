<?php


namespace App\Http\ViewModels\Customers\CustomerTypes;

use App\Domain\Customers\CustomerTypes\Model\CustomerType;
use Illuminate\Contracts\Support\Arrayable;


class ShowCustomerTypeVM implements Arrayable
{

    private $CustomerType;

    public function __construct($CustomerTypeId)
    {
        $this->CustomerType = CustomerType::find($CustomerTypeId) ;
    }
    public function toArray()
    {
        return [
            'CustomerType' => $this->CustomerType
        ];
    }
}
