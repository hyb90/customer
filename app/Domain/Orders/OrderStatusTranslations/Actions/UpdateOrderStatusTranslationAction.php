<?php


namespace App\Domain\Orders\OrderStatusTranslations\Actions;

use App\Domain\Orders\OrderStatusTranslations\DTO\OrderStatusTranslationDTO;
use App\Domain\Orders\OrderStatuses\Model\OrderStatus;
use App\Domain\Orders\OrderStatusTranslations\Model\OrderStatusTranslation;
use Illuminate\Support\Facades\Auth;

class UpdateOrderStatusTranslationAction
{
    public static function execute(
        OrderStatusTranslationDTO $orderStatusTranslationDTO, OrderStatusTranslation $orderStatusTranslation
    ){
        $creator=$orderStatusTranslation->created_by_user_id;
        $orderStatusTranslation->update($orderStatusTranslationDTO->toArray());
        $orderStatusTranslationDTO->updated_by_user_id = Auth::id();
        $orderStatusTranslation->created_by_user_id = $creator;
        $orderStatusTranslation->save();
        return $orderStatusTranslationDTO ;
    }
}
