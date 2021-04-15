<?php


namespace App\Domain\General\Devices\DTO;


use Spatie\DataTransferObject\DataTransferObject;

class DeviceDTO extends DataTransferObject
{

    /* @var string */
    public $name;
    /* @var string|null */
    public $description;
    /* @var string|null */
    public $first_visit_at;
    /* @var string|null */
    public $last_visit_at;
    /* @var integer */
    public $region_id ;
    /* @var integer|null */
    public $visites_number ;
    /* @var integer */
    public $device_types_id  ;
    /* @var string */
    public $serial_number;
    /* @var integer|null */
    public $created_by_user_id;
    /* @var integer|null */
    public $updated_by_user_id;
    /* @var integer|null */
    public $deleted_by_user_id;

    public static function fromRequest($request){
        return new self([
            'name' => $request['name'] ?? null,
            'description' => $request['description'] ?? null,
            'first_visit_at' => $request['first_visit_at'] ?? null,
            'last_visit_at' => $request['last_visit_at'] ?? null,
            'region_id' => $request['region_id'] ?? null,
            'visites_number' => $request['visites_number'] ?? null,
            'device_types_id' => $request['device_types_id'] ?? null,
            'serial_number' => $request['serial_number'] ?? null,
            'created_by_user_id' => $request['created_by_user_id'] ?? null,
            'updated_by_user_id' => $request['updated_by_user_id'] ?? null,
            'deleted_by_user_id' => $request['deleted_by_user_id'] ?? null,
        ]);
    }

}
