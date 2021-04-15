<?php

namespace App\Domain\General\Auth\Roles\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class RoleDTO extends DataTransferObject
{

    /* @var string */
    public $name;
    /* @var string */
    public $description;

    public static function fromRequest($request){
        return new self([
            'name' => $request['name'] ,
            'description' => $request['description'],
        ]);
    }
}
