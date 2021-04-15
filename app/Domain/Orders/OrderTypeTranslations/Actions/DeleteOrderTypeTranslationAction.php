<?php


namespace App\Domain\Orders\OrderTypeTranslations\Actions;
use App\Domain\Orders\OrderTypeTranslations\Model\OrderTypeTranslation;
use Illuminate\Support\Facades\Auth;

class DeleteOrderTypeTranslationAction
{
    public static function execute(
        OrderTypeTranslation $contractStatusTranslation
    ){
        $contractStatusTranslation->deleted_by_user_id = Auth::id();
        $contractStatusTranslation->save();
        $contractStatusTranslation->delete();
        return "deleted successfully.";
    }
}
