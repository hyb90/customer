<?php


namespace App\Domain\Orders\OrderTypeTranslations\Actions;

use App\Domain\Orders\OrderTypeTranslations\DTO\OrderTypeTranslationDTO;
use App\Domain\Orders\OrderTypes\Model\OrderType;
use App\Domain\Orders\OrderTypeTranslations\Model\OrderTypeTranslation;
use Illuminate\Support\Facades\Auth;

class UpdateOrderTypeTranslationAction
{
    public static function execute(
        OrderTypeTranslationDTO $orderTypeTranslationDTO, OrderTypeTranslation $orderTypeTranslation
    ){
        $creator=$orderTypeTranslation->created_by_user_id;
        $orderTypeTranslation->update($orderTypeTranslationDTO->toArray());
        $orderTypeTranslationDTO->updated_by_user_id = Auth::id();
        $orderTypeTranslation->created_by_user_id = $creator;
        $orderTypeTranslation->save();
        return $orderTypeTranslationDTO ;
    }
}
