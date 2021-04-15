<?php


namespace App\Domain\Customers\Customer\DTO;


use Illuminate\Support\Facades\Hash;
use Spatie\DataTransferObject\DataTransferObject;

class CustomerDTO extends DataTransferObject
{

    /* @var integer */
    public $user_id;
    /* @var integer */
    public $manager_id;
    /* @var integer */
    public $customer_type_id;
    /* @var integer */
    public $customer_status_id;

    public static function fromRequest($request){
        return new self([
            'user_id'         => $request['user_id'] ?? null,
            'manager_id'         => $request['manager_id'] ?? null,
            'customer_type_id'         => $request['customer_type_id'] ?? null,
            'customer_status_id'         => $request['customer_status_id'] ?? null,

        ]);
    }

}
