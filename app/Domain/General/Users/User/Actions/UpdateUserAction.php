<?php


namespace App\Domain\General\Users\User\Actions;


use App\Domain\General\Users\User\DTO\UserDTO;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UpdateUserAction
{
    public static function execute(
        UserDTO $userDTO
    ){
        $user = User::find($userDTO->id);
        $user->update($userDTO->toArray());
        $user->save();
        return $user;

    }

}
