<?php


namespace App\Http\ViewModels\Orders;


use App\Domain\Orders\OrderStatuses\Model\OrderStatus;
use Illuminate\Contracts\Support\Arrayable;

class OrderStatusesIndexVM implements Arrayable
{

    private $regions ;
    public function __construct()
    {
        $this->regions = array();
        $regions = OrderStatus::all();
        foreach ($regions as $region){
            $region = new ShowOrderStatusVM($region);
            array_push($this->regions,$region->toArray());
        }
    }

    public function toArray()
    {
        return [
          'ordersStatuses' => $this->regions
        ];
    }
}
