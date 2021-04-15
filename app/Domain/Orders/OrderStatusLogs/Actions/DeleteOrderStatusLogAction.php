<?php


namespace App\Domain\Orders\OrderStatusLogs\Actions;




use App\Domain\Orders\OrderStatusLogs\Model\OrderStatusLog;
use Illuminate\Support\Facades\Auth;

class DeleteOrderStatusLogAction
{
    public static function execute(
        OrderStatusLog $orderStatus
    ){
        $orderStatus->deleted_by_user_id = Auth::id();
        $orderStatus->save();
        $orderStatus->delete();
        return "deleted successfully.";
    }
}
