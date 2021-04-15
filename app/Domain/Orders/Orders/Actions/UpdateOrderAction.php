<?php


namespace App\Domain\Orders\Orders\Actions;

use App\Domain\Orders\Orders\DTO\OrderDTO;
use App\Domain\Orders\Orders\Model\Order;
use Illuminate\Support\Facades\Auth;

class UpdateOrderAction
{
    public static function execute(
        Order $order,
        OrderDTO $orderDTO
    ){
        $creator=$order->created_by_user_id;
        $order->update($orderDTO->toArray());
        $order->updated_by_user_id = Auth::id();
        $order->created_by_user_id = $creator;
        $order->save();
        return $order ;
    }
}
