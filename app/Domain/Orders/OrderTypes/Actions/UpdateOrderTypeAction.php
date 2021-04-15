<?php


namespace App\Domain\Orders\OrderTypes\Actions;

use App\Domain\Orders\OrderTypes\DTO\OrderTypeDTO;
use App\Domain\Orders\OrderTypes\Model\OrderType;
use Illuminate\Support\Facades\Auth;

class UpdateOrderTypeAction
{
    public static function execute(
        OrderTypeDTO $orderTypeDTO, OrderType $orderType
    ){
        $creator=$orderType->created_by_user_id;
        $orderType->update($orderTypeDTO->toArray());
        $orderType->updated_by_user_id = Auth::id();
        $orderType->created_by_user_id = $creator;
        $orderType->save();
        return $orderType ;
    }
}
