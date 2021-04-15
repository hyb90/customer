<?php


namespace App\Http\ViewModels\Customers\CustomerVsLabels;

use App\Domain\Customers\CustomerVsLabels\Model\CustomerVsLabel;
use Illuminate\Contracts\Support\Arrayable;


class ShowCustomerVsLabelVM implements Arrayable
{

    private $CustomerVsLabel;

    public function __construct($CustomerVsLabelId)
    {
        $this->CustomerVsLabel = CustomerVsLabel::find($CustomerVsLabelId) ;
    }
    public function toArray()
    {
        return [
            'CustomerVsLabel' => $this->CustomerVsLabel
        ];
    }
}
