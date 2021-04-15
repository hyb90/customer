<?php


namespace App\Domain\Orders\OrderStatuses\Actions;

use App\Domain\Orders\OrderStatuses\DTO\OrderStatusDTO;
use App\Domain\Orders\OrderStatuses\Model\OrderStatus;
use Illuminate\Support\Facades\Auth;

class UpdateOrderStatusAction
{
    public static function execute(
        OrderStatusDTO $orderStatusDTO, OrderStatus $orderStatus
    ){
        $creator=$orderStatus->created_by_user_id;
        $orderStatus->update($orderStatusDTO->toArray());
        $orderStatus->updated_by_user_id = Auth::id();
        $orderStatus->created_by_user_id = $creator;
        $orderStatus->save();
        return $orderStatus ;
    }
}
