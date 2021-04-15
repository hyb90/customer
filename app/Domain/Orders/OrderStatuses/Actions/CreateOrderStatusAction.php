<?php


namespace App\Domain\Orders\OrderStatuses\Actions;

use App\Domain\Orders\OrderStatuses\DTO\OrderStatusDTO;
use App\Domain\Orders\OrderStatuses\Model\OrderStatus;
use Illuminate\Support\Facades\Auth;

class CreateOrderStatusAction
{
    public static function execute(
        OrderStatusDTO $orderStatusDTO
    ){

        $new_order_status = new OrderStatus($orderStatusDTO->toArray());
        $new_order_status->created_by_user_id = Auth::id();
        $new_order_status->save();
        return $new_order_status ;
    }
}
