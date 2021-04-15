<?php


namespace App\Domain\Orders\OrderFiles\Actions;


use App\Domain\Orders\OrderFiles\DTO\OrderFileDTO;
use App\Domain\Orders\OrderFiles\Model\OrderFile;
use Illuminate\Support\Facades\Auth;

class UpdateOrderFileAction
{
    public static function execute(
        OrderFile $order_file,
        OrderFileDTO $orderFileDTO
    ){
        $creator=$order_file->created_by_user_id;

        $order_file->update($orderFileDTO->toArray());
        $order_file->updated_by_user_id = Auth::id();
        $order_file->created_by_user_id = $creator;
        $order_file->save();
        return $order_file ;
    }
}
