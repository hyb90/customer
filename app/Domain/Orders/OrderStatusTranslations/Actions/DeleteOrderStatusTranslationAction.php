<?php


namespace App\Domain\Orders\OrderStatusTranslations\Actions;
use App\Domain\Orders\OrderStatusTranslations\Model\OrderStatusTranslation;
use Illuminate\Support\Facades\Auth;

class DeleteOrderStatusTranslationAction
{
    public static function execute(
        OrderStatusTranslation $orderStatusTranslation
    ){
        $orderStatusTranslation->deleted_by_user_id = Auth::id();
        $orderStatusTranslation->save();
        $orderStatusTranslation->delete();
        return "deleted successfully.";
    }
}
