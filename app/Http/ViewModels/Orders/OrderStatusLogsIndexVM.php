<?php


namespace App\Http\ViewModels\Orders;




use App\Domain\Orders\OrderStatusLogs\Model\OrderStatusLog;
use Illuminate\Contracts\Support\Arrayable;

class OrderStatusLogsIndexVM implements Arrayable
{

    private $orders ;
    public function __construct()
    {
        $this->orders= array();
        $orders = OrderStatusLog::all();
        foreach ($orders as $order){
            $content= new ShowOrderStatusLogVM($order);
            array_push($this->orders,$content->toArray());
        }
    }

    public function toArray()
    {
        return [
          'Order Status Logs' => $this->orders
        ];
    }
}
