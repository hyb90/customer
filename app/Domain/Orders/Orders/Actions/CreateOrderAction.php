<?php


namespace App\Domain\Orders\Orders\Actions;

use App\Domain\Orders\Orders\DTO\OrderDTO;
use App\Domain\Orders\Orders\Model\Order;
use Illuminate\Support\Facades\Auth;

class CreateOrderAction
{
    public static function execute(
        OrderDTO $orderDTO
    ){
        $new_order = new Order($orderDTO->toArray());
        $new_order->created_by_user_id = Auth::id();
        $new_order->save();

        return $new_order ;
    }
}
