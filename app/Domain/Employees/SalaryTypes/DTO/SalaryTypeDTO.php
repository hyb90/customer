<?php


namespace App\Domain\Employees\SalaryTypes\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class SalaryTypeDTO extends DataTransferObject
{
    public $id;


    public static function fromRequest($request)
    {
        return new self([
            'id'        =>  $request['id'] ?? null


        ]);
    }
}
