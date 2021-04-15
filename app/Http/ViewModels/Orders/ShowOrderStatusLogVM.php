<?php


namespace App\Http\ViewModels\Orders;






use App\Domain\Orders\OrderStatusLogs\Model\OrderStatusLog;
use Illuminate\Contracts\Support\Arrayable;

class ShowOrderStatusLogVM implements Arrayable
{
    private $order;
    public function __construct(OrderStatusLog $order)
    {

        $this->order = $order;
    }



    public function toArray()
    {
        return $this->order;
    }
}
