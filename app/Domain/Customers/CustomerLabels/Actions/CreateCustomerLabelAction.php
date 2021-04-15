<?php


namespace App\Domain\Customers\CustomerLabels\Actions;


use App\Domain\Customers\CustomerLabels\DTO\CustomerLabelDTO;
use App\Domain\Customers\CustomerLabels\Model\CustomerLabel;
use Illuminate\Support\Facades\Auth;

class CreateCustomerLabelAction
{
    public static function execute(
        CustomerLabelDTO $CustomerLabelDTO
    ){

        $CustomerLabel = new CustomerLabel(array_filter($CustomerLabelDTO->toArray()));
        $CustomerLabel->save();
        return $CustomerLabel ;
    }
}
