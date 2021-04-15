<?php


namespace App\Domain\Customers\CustomerStatuss\Actions;


use App\Domain\Customers\CustomerStatuss\DTO\CustomerStatusDTO;
use App\Domain\Customers\CustomerStatuss\Model\CustomerStatus;
use Illuminate\Support\Facades\Auth;

class UpdateCustomerStatusAction
{

    public static function execute(
        CustomerStatusDTO $CustomerStatusDTO
    ){
        $CustomerStatus = CustomerStatus::find($CustomerStatusDTO->id);
        $CustomerStatus->update(array_filter($CustomerStatusDTO->toArray()));
        $CustomerStatus->save();
        return $CustomerStatus;
    }
}
