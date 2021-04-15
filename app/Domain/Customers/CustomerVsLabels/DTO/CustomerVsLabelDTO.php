<?php


namespace App\Domain\Customers\CustomerVsLabels\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class CustomerVsLabelDTO extends DataTransferObject
{
    public $id;
    public $customer_id;
    public $customer_label_id;
	public $created_by_user_id;
	public $updated_by_user_id;
	public $deleted_by_user_id;


    public static function fromRequest($request)
    {
        return new self([
            'id'                        => $request['id'] ?? null,
            'customer_id' 			    => $request['customer_id'] ?? null ,
            'customer_label_id' 		=> $request['customer_label_id'] ?? null ,
			'created_by_user_id' 		=> $request['created_by_user_id'] ?? null ,
			'updated_by_user_id' 		=> $request['updated_by_user_id'] ?? null ,
			'deleted_by_user_id' 		=> $request['deleted_by_user_id'] ?? null ,
        ]);
    }
}
