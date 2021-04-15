<?php


namespace App\Domain\General\Auth\Roles\DTO;


use Spatie\DataTransferObject\DataTransferObject;

class ChangeRoleDTO  extends DataTransferObject
{
    /* @var integer */
    public $user_id;
    /* @var integer */
    public $role_id;


    public static function fromRequest($request)
    {
        return new self([
            'user_id' => $request['user_id'],
            'role_id' => $request['role_id'],
        ]);
    }
}
