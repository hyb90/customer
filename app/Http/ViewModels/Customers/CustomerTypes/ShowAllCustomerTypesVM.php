<?php


namespace App\Http\ViewModels\Customers\CustomerTypes;

use App\Domain\Customers\CustomerTypes\Model\CustomerType;
use Illuminate\Contracts\Support\Arrayable;

class ShowAllCustomerTypesVM implements Arrayable
{

    private $CustomerTypes;

    public function __construct(){

        $this->CustomerTypes = array();
        $CustomerTypes = CustomerType::all();
        foreach ($CustomerTypes as $CustomerType) {
            $one_CustomerType = new ShowCustomerTypeVM($CustomerType->id);
            array_push($this->CustomerTypes,$one_CustomerType->toArray());
        }
    }
    public function toArray()
    {
        return [
            'CustomerTypes' => $this->CustomerTypes
        ];
    }
}
