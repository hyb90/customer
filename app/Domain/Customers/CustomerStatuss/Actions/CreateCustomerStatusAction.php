<?php


namespace App\Domain\Customers\CustomerStatuss\Actions;


use App\Domain\Customers\CustomerStatuss\DTO\CustomerStatusDTO;
use App\Domain\Customers\CustomerStatuss\Model\CustomerStatus;
use Illuminate\Support\Facades\Auth;

class CreateCustomerStatusAction
{
    public static function execute(
        CustomerStatusDTO $CustomerStatusDTO
    ){

        $CustomerStatus = new CustomerStatus(array_filter($CustomerStatusDTO->toArray()));
        $CustomerStatus->save();
        return $CustomerStatus ;
    }
}
