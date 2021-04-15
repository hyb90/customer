<?php


namespace App\Domain\Employees\EmployeeStatuses\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class EmployeeStatusDTO extends DataTransferObject
{
    public $id;
    public $name;
    public $created_by_user_id;
    public $updated_by_user_id;
    public $deleted_by_user_id;

    public static function fromRequest($request)
    {
        return new self([
            'id'                =>  $request['id'] ?? null,
            'name'              =>  $request['name'] ?? null,
            'created_by_user_id' => $request['created_by_user_id'] ?? null,
            'updated_by_user_id' => $request['updated_by_user_id'] ?? null,
            'deleted_by_user_id' => $request['deleted_by_user_id'] ?? null,
        ]);
    }
}
