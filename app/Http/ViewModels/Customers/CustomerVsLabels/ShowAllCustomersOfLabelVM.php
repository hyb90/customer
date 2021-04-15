<?php


namespace App\Http\ViewModels\Customers\CustomerVsLabels;


use App\Domain\Customers\CustomerVsLabels\Model\CustomerVsLabel;
use Illuminate\Contracts\Support\Arrayable;

class ShowAllCustomersOfLabelVM implements Arrayable
{
    private $Customers;

    public function __construct($LabelId)
    {
        $this->Customers = CustomerVsLabel::where('customer_label_id',$LabelId)->get() ;
    }
    public function toArray()
    {
        return [
            'Customers' => $this->Customers
        ];
    }
}
