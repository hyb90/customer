<?php


namespace App\Domain\Orders\OrderStatusTranslations\Actions;

use App\Domain\Orders\OrderStatusTranslations\DTO\OrderStatusTranslationDTO;
use App\Domain\Orders\OrderStatusTranslations\Model\OrderStatusTranslation;
use Illuminate\Support\Facades\Auth;

class CreateOrderStatusTranslationAction
{
    public static function execute(
        OrderStatusTranslationDTO $orderStatusTranslationDTO
    ){

        $new_order_status_translation = new OrderStatusTranslation($orderStatusTranslationDTO->toArray());
        $new_order_status_translation->created_by_user_id = Auth::id();
        $new_order_status_translation->save();
        return $new_order_status_translation;
    }
}
