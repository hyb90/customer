<?php


namespace App\Domain\Orders\OrderStatusLogs\Actions;


use App\Domain\Orders\OrderStatusLogs\DTO\OrderStatusLogDTO;
use App\Domain\Orders\OrderStatusLogs\Model\OrderStatusLog;
use Illuminate\Support\Facades\Auth;

class CreateOrderStatusLogAction
{
    public static function execute(
        OrderStatusLogDTO $orderStatusDTO
    ){
        $new_orderStatus = new OrderStatusLog($orderStatusDTO->toArray());
        $new_orderStatus->created_by_user_id = Auth::id();
        $new_orderStatus->save();
        return $new_orderStatus ;
    }
}
