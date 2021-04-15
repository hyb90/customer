<?php


namespace App\Domain\Orders\OrderTypes\Actions;

use App\Domain\Orders\OrderTypes\DTO\OrderTypeDTO;
use App\Domain\Orders\OrderTypes\Model\OrderType;
use Illuminate\Support\Facades\Auth;

class CreateOrderTypeAction
{
    public static function execute(
        OrderTypeDTO $orderTypeDTO
    ){

        $new_contract_status = new OrderType($orderTypeDTO->toArray());
        $new_contract_status->created_by_user_id = Auth::id();
        $new_contract_status->save();
        return $new_contract_status ;
    }
}
