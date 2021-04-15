<?php


namespace App\Http\ViewModels\Orders;


use App\Domain\Orders\OrderTypes\Model\OrderType;
use App\Domain\Orders\OrderTypeTranslations\Model\OrderTypeTranslation;


use Illuminate\Contracts\Support\Arrayable;

class ShowOrderTypeVM implements Arrayable
{
    private $orderType;
    public function __construct(OrderType $orderType)
    {
        $this->orderType = $orderType;
        $this->orderType->setAttribute('names',$this->get_names($orderType->id));

    }

    public function get_names($status_id){

        $order_status = OrderTypeTranslation::where('order_type_id',$status_id)->get();
        return $order_status ;
    }

    public function toArray()
    {
        return $this->orderType;
    }
}
