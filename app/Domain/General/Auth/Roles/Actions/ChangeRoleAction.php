<?php

namespace App\Domain\General\Auth\Roles\Actions;

use App\Domain\General\Auth\Roles\DTO\ChangeRoleDTO;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class ChangeRoleAction
{


    public static function execute(
        ChangeRoleDTO $changeRole
    ){
        DB::table('oauth_access_tokens')
            ->where('user_id','=',$changeRole->user_id)
            ->update(['scopes' => "[\"".Role::find($changeRole->role_id)->name."\"]"]);
        DB::table('users')
            ->where('id','=',$changeRole->user_id)
            ->update(['role_id' => $changeRole->role_id]);

        $scope = DB::table('oauth_access_tokens')
            ->where('user_id','=',$changeRole->user_id)->first()->scopes;
        return $scope ;
    }
}
