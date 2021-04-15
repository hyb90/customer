<?php


namespace App\Domain\Customers\Customer\Actions;


use App\Domain\Customers\Customer\DTO\CustomerDTO;
use App\Domain\Customers\Customer\Model\Customer;
use Illuminate\Support\Facades\Auth;

class CreateCustomerAction
{

    public static function execute(
        CustomerDTO $customerDTO
    ){
        $customer = new Customer($customerDTO->toArray());
        $customer->save();
        return $customer;
    }
}
