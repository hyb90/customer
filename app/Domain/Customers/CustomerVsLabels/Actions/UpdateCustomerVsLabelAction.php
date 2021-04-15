<?php


namespace App\Domain\Customers\CustomerVsLabels\Actions;


use App\Domain\Customers\CustomerVsLabels\DTO\CustomerVsLabelDTO;
use App\Domain\Customers\CustomerVsLabels\Model\CustomerVsLabel;
use Illuminate\Support\Facades\Auth;

class UpdateCustomerVsLabelAction
{

    public static function execute(
        CustomerVsLabelDTO $CustomerVsLabelDTO
    ){
        $CustomerVsLabel = CustomerVsLabel::find($CustomerVsLabelDTO->id);
        $CustomerVsLabel->update(array_filter($CustomerVsLabelDTO->toArray()));
        $CustomerVsLabel->save();
        return $CustomerVsLabel;
    }
}
