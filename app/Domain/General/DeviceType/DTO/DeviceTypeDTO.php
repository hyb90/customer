<?php


namespace App\Domain\General\DeviceType\DTO;


use Spatie\DataTransferObject\DataTransferObject;

class DeviceTypeDTO extends DataTransferObject
{

    /* @var integer */
    public $id;
    /* @var string */
    public $name;
    /* @var integer|null */
    public $parent_id;

    public static function fromRequest($request){
        return new self([
            'id'    => $request['id'] ?? null,
            'name' => $request['name'] ?? null,
            'parent_id' => $request['parent_id'] ?? null,
        ]);
    }
}
