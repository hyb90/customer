<?php


namespace App\Domain\Orders\Orders\Actions;

use App\Domain\Orders\OrderComments\Actions\DeleteOrderCommentAction;
use App\Domain\Orders\OrderComments\Model\OrderComment;
use App\Domain\Orders\OrderFiles\Actions\DeleteOrderFileAction;
use App\Domain\Orders\OrderFiles\Model\OrderFile;
use App\Domain\Orders\Orders\Model\Order;
use App\Domain\Orders\WorkOrders\Actions\DeleteWorkOrderAction;
use App\Domain\Orders\WorkOrders\Model\WorkOrder;
use Illuminate\Support\Facades\Auth;

class DeleteOrderAction
{
    public static function execute(
        Order $order
    ){
        $order_files = OrderFile::where('order_id',$order->id)
            ->get();
        foreach ($order_files as $file){
            DeleteOrderFileAction::execute($file);
        }
        $order->deleted_by_user_id = Auth::id();
        $order->save();
        $order->delete();
        return "deleted successfully.";
    }
}
