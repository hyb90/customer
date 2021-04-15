<?php


namespace App\Domain\Employees\EmployeeVsLabels\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class EmployeeVsLabelDTO extends DataTransferObject
{
    public $id;
    public $employee_id;
	public $employee_label_id;
	public $created_by_user_id;
	public $updated_by_user_id;
	public $deleted_by_user_id;


    public static function fromRequest($request)
    {
        return new self([
            'id'                            => $request['id'] ?? null,
            'employee_id' 					=> $request['employee_id'] ?? null ,
			'employee_label_id' 					=> $request['employee_label_id'] ?? null ,
			'created_by_user_id' 					=> $request['created_by_user_id'] ?? null ,
			'updated_by_user_id' 					=> $request['updated_by_user_id'] ?? null ,
			'deleted_by_user_id' 					=> $request['deleted_by_user_id'] ?? null ,


        ]);
    }
}
