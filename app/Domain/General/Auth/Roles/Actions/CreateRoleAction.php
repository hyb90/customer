<?php


namespace App\Domain\General\Auth\Roles\Actions;


use App\Domain\General\Auth\Roles\DTO\RoleDTO;
use App\Models\Role;

class CreateRoleAction
{
    public static function execute(
        RoleDTO $role
    ){
        $new_role = new Role($role->toArray());

        $new_role->save();

        return $new_role;
    }
}
