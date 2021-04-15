<?php


namespace App\Domain\General\Users\User\Actions;


use App\Domain\General\Users\User\DTO\UserDTO;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CreateUserAction
{

    public static function execute(
        UserDTO $userDTO
    ){
        $user = new User($userDTO->toArray());
        $user->created_by_user_id = Auth::id();
        $user->save();
        return $user;

    }

}
