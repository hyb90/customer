<?php


namespace App\Domain\Customers\CustomerLabels\Actions;


use App\Domain\Customers\CustomerLabels\DTO\CustomerLabelDTO;
use App\Domain\Customers\CustomerLabels\Model\CustomerLabel;
use Illuminate\Support\Facades\Auth;

class DeleteCustomerLabelAction
{
    public static function execute(
        CustomerLabelDTO   $CustomerLabelDTO
    ){

        $CustomerLabel = CustomerLabel::find($CustomerLabelDTO->id);
        $CustomerLabel->update(array_filter($CustomerLabelDTO->toArray()));
        $CustomerLabel->save();
        $CustomerLabel->delete();
        return "deleted successfully.";
    }
}
