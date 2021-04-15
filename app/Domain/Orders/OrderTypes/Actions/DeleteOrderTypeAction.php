<?php


namespace App\Domain\Orders\OrderTypes\Actions;


use App\Domain\Orders\OrderTypes\Model\OrderType;
use App\Domain\Orders\OrderTypeTranslations\Actions\DeleteOrderTypeTranslationAction;
use App\Domain\Orders\OrderTypeTranslations\Model\OrderTypeTranslation;
use Illuminate\Support\Facades\Auth;

class DeleteOrderTypeAction
{
    public static function execute(
        OrderType $orderType
    ){
        $orderType_translations = OrderTypeTranslation::where('order_type_id',$orderType->id)
            ->get();
        foreach ($orderType_translations as $translation){
            DeleteOrderTypeTranslationAction::execute($translation);
        }
        $orderType->deleted_by_user_id = Auth::id();
        $orderType->save();
        $orderType->delete();
        return "deleted successfully.";
    }
}
