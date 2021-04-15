<?php


namespace App\Http\ViewModels\Customers\CustomerVsLabels;


use App\Domain\Customers\CustomerVsLabels\Model\CustomerVsLabel;
use Illuminate\Contracts\Support\Arrayable;

class ShowAllLabelsOfCustomerVM implements Arrayable
{
    private $Labels;

    public function __construct($CustomerId)
    {
        $this->Labels = CustomerVsLabel::where('customer_id',$CustomerId)->get() ;
    }
    public function toArray()
    {
        return [
            'Labels' => $this->Labels
        ];
    }
}
