<?php


namespace App\Domain\General\Users\User\Actions;


use App\Domain\General\Users\User\DTO\UserDTO;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DeleteUserAction
{
    public static function execute(
        UserDTO $UserDTO
    ){
        $User = User::find($UserDTO->id);
        $User->update(array_filter($UserDTO->all()));
        $User->save();
        $User->delete();
        return "deleted successfully.";
    }
}
