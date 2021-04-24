<?php


namespace App\Http\ViewModels\Orders;


use App\Domain\Orders\Orders\Model\Order;
use Illuminate\Contracts\Support\Arrayable;

class OrdersIndexVM implements Arrayable
{

    private $orders ;
    public function __construct($filter = null)
    {
        $this->orders= array();
        $orders = new Order();

        if($filter['status'])
            $orders = $orders->where('order_status_id', $filter['status']);

        if($filter['from_date'] && $filter['to_date'])
            $orders = $orders->whereBetween('created_at', [$filter['from_date'], $filter['to_date']]);

        $filter_type = $filter['asc'] ? 'asc' : 'desc';

        if($filter['creation_date'])
            $orders->orderBy('created_at', $filter_type);

        if($filter['shipping_date'])
            $orders->orderBy('shipping_date', $filter_type);

        if($filter['total_price'])
            $orders->orderBy('total_price', $filter_type);


        $orders = $orders->get();
        foreach ($orders as $order){
            $order= new ShowOrderVM($order);
            array_push($this->orders,$order->toArray());
        }
    }

    public function toArray()
    {
        return [
          'orders' => $this->orders
        ];
    }
}
