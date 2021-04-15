<?php


namespace App\Domain\Orders\OrderStatuses\Actions;


use App\Domain\Orders\OrderStatuses\Model\OrderStatus;
use App\Domain\Orders\OrderStatusTranslations\Actions\DeleteOrderStatusTranslationAction;
use App\Domain\Orders\OrderStatusTranslations\Model\OrderStatusTranslation;
use Illuminate\Support\Facades\Auth;

class DeleteOrderStatusAction
{
    public static function execute(
        OrderStatus $orderStatus
    ){
        $orderStatus_translations = OrderStatusTranslation::where('order_status_id',$orderStatus->id)
            ->get();
        foreach ($orderStatus_translations as $translation){
            DeleteOrderStatusTranslationAction::execute($translation);
        }
        $orderStatus->deleted_by_user_id = Auth::id();
        $orderStatus->save();
        $orderStatus->delete();
        return "deleted successfully.";
    }
}
