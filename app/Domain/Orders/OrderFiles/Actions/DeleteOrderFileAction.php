<?php


namespace App\Domain\Orders\OrderFiles\Actions;

use App\Domain\Orders\OrderFiles\Model\OrderFile;
use Illuminate\Support\Facades\Auth;

class DeleteOrderFileAction
{
    public static function execute(
        OrderFile $order_file
    ){
        $order_file->deleted_by_user_id = Auth::id();
        $order_file->save();
        $order_file->delete();
        return "deleted successfully.";
    }
}
