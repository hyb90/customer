<?php


namespace App\Domain\General\Auth\Roles\Actions;


use App\Domain\General\Auth\Roles\DTO\RoleDTO;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class UpdateRoleAction
{

    public static function execute(
        Role $role,
        RoleDTO $roleDTO
    ){
        $role->update($roleDTO->toArray());
        $role->updated_by_user_id = Auth::id();
        $role->save();
        return $role;
    }
}
