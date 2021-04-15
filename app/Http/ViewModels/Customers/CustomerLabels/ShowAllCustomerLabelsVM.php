<?php


namespace App\Http\ViewModels\Customers\CustomerLabels;

use App\Domain\Customers\CustomerLabels\Model\CustomerLabel;
use Illuminate\Contracts\Support\Arrayable;

class ShowAllCustomerLabelsVM implements Arrayable
{

    private $CustomerLabels;

    public function __construct(){

        $this->CustomerLabels = array();
        $CustomerLabels = CustomerLabel::all();
        foreach ($CustomerLabels as $CustomerLabel) {
            $one_CustomerLabel = new ShowCustomerLabelVM($CustomerLabel->id);
            array_push($this->CustomerLabels,$one_CustomerLabel->toArray());
        }
    }
    public function toArray()
    {
        return [
            'CustomerLabels' => $this->CustomerLabels
        ];
    }
}
