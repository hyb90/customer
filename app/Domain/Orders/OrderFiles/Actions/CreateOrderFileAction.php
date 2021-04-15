<?php


namespace App\Domain\Orders\OrderFiles\Actions;

use App\Domain\Orders\OrderFiles\DTO\OrderFileDTO;
use App\Domain\Orders\OrderFiles\Model\OrderFile;
use Illuminate\Support\Facades\Auth;

class CreateOrderFileAction
{
    public static function execute(
        OrderFileDTO $orderFileDTO
    ){
        $new_order_file = new OrderFile($orderFileDTO->toArray());
        $new_order_file->created_by_user_id = Auth::id();
        $new_order_file->save();
        return $new_order_file ;
    }
}
