<?php


namespace App\Domain\Orders\OrderTypeTranslations\Actions;

use App\Domain\Orders\OrderTypeTranslations\DTO\OrderTypeTranslationDTO;
use App\Domain\Orders\OrderTypeTranslations\Model\OrderTypeTranslation;
use Illuminate\Support\Facades\Auth;

class CreateOrderTypeTranslationAction
{
    public static function execute(
        OrderTypeTranslationDTO $orderTypeTranslationDTO
    ){

        $new_contract_status_translation = new OrderTypeTranslation($orderTypeTranslationDTO->toArray());
        $new_contract_status_translation->created_by_user_id = Auth::id();
        $new_contract_status_translation->save();
        return $new_contract_status_translation;
    }
}
