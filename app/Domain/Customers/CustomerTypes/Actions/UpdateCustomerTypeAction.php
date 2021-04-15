<?php


namespace App\Domain\Customers\CustomerTypes\Actions;


use App\Domain\Customers\CustomerTypes\DTO\CustomerTypeDTO;
use App\Domain\Customers\CustomerTypes\Model\CustomerType;
use Illuminate\Support\Facades\Auth;

class UpdateCustomerTypeAction
{

    public static function execute(
        CustomerTypeDTO $CustomerTypeDTO
    ){
        $CustomerType = CustomerType::find($CustomerTypeDTO->id);
        $CustomerType->update(array_filter($CustomerTypeDTO->toArray()));
        $CustomerType->save();
        return $CustomerType;
    }
}
