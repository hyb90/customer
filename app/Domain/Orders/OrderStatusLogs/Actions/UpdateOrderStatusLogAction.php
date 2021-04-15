<?php


namespace App\Domain\Orders\OrderStatusLogs\Actions;


use App\Domain\Orders\OrderStatusLogs\DTO\OrderStatusLogDTO;
use App\Domain\Orders\OrderStatusLogs\Model\OrderStatusLog;
use Illuminate\Support\Facades\Auth;

class UpdateOrderStatusLogAction
{
    public static function execute(
        OrderStatusLog $orderStatus,
        OrderStatusLogDTO $orderStatusDTO
    ){
        $creator=$orderStatus->created_by_user_id;

        $orderStatus->update($orderStatusDTO->toArray());
        $orderStatus->updated_by_user_id = Auth::id();
        $orderStatus->created_by_user_id = $creator;
        $orderStatus->save();
        return $orderStatus ;
    }
}
