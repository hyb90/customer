<?php


namespace App\Http\ViewModels\Orders;


use App\Domain\Orders\OrderStatuses\Model\OrderStatus;
use App\Domain\Orders\Orders\Model\Order;
use App\Domain\Orders\OrderStatusTranslations\Model\OrderStatusTranslation;


use Illuminate\Contracts\Support\Arrayable;

class ShowOrderStatusVM implements Arrayable
{
    private $orderStatus;
    public function __construct(OrderStatus $orderStatus)
    {
        $this->orderStatus = $orderStatus;
        $this->orderStatus->setAttribute('names',$this->get_names($orderStatus->id));
        $this->orderStatus->setAttribute('orders_count',$this->get_orders_count($orderStatus->id));

    }

    public function get_names($status_id){

        $order_status = OrderStatusTranslation::where('order_status_id',$status_id)->get();
        return $order_status ;
    }

    public function get_orders_count($status_id){

        $order_status_count = Order::where('order_status_id',$status_id)->count();
        return $order_status_count ;
    }

    public function toArray()
    {
        return $this->orderStatus;
    }
}
