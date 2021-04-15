<?php


namespace App\Http\ViewModels\Customers\CustomerVsLabels;

use App\Domain\Customers\CustomerVsLabels\Model\CustomerVsLabel;
use Illuminate\Contracts\Support\Arrayable;

class ShowAllCustomerVsLabelsVM implements Arrayable
{

    private $CustomerVsLabels;

    public function __construct(){

        $this->CustomerVsLabels = array();
        $CustomerVsLabels = CustomerVsLabel::all();
        foreach ($CustomerVsLabels as $CustomerVsLabel) {
            $one_CustomerVsLabel = new ShowCustomerVsLabelVM($CustomerVsLabel->id);
            array_push($this->CustomerVsLabels,$one_CustomerVsLabel->toArray());
        }
    }
    public function toArray()
    {
        return [
            'CustomerVsLabels' => $this->CustomerVsLabels
        ];
    }
}
