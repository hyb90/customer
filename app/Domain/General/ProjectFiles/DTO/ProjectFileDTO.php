<?php


namespace App\Domain\General\ProjectFiles\DTO;


use Spatie\DataTransferObject\DataTransferObject;

class ProjectFileDTO extends DataTransferObject
{

    /* @var integer */
    public $id;
    /* @var string */
    public $file_name;
    /* @var string */
    public $file_path;

    public static function fromRequest($request){
        return new self([
            'id'        => $request['id'] ?? null,
            'file_name' => $request['file_name'] ?? null,
            'file_path' => $request['file_path'] ?? null,
        ]);
    }
}
