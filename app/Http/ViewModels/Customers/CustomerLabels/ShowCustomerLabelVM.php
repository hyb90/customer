<?php


namespace App\Http\ViewModels\Customers\CustomerLabels;

use App\Domain\Customers\CustomerLabels\Model\CustomerLabel;
use Illuminate\Contracts\Support\Arrayable;


class ShowCustomerLabelVM implements Arrayable
{

    private $CustomerLabel;

    public function __construct($CustomerLabelId)
    {
        $this->CustomerLabel = CustomerLabel::find($CustomerLabelId) ;
    }
    public function toArray()
    {
        return [
            'CustomerLabel' => $this->CustomerLabel
        ];
    }
}
