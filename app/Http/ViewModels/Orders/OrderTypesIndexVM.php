<?php


namespace App\Http\ViewModels\Orders;


use App\Domain\orders\OrderTypes\Model\OrderType;
use Illuminate\Contracts\Support\Arrayable;

class OrderTypesIndexVM implements Arrayable
{

    private $regions ;
    public function __construct()
    {
        $this->regions = array();
        $regions = OrderType::all();
        foreach ($regions as $region){
            $region = new ShowOrderTypeVM($region);
            array_push($this->regions,$region->toArray());
        }
    }

    public function toArray()
    {
        return [
          'orderTypes' => $this->regions
        ];
    }
}
