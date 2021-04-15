<?php

namespace App\Domain\General\Auth\General\Login\DTO;

use Illuminate\Support\Facades\Hash;
use Spatie\DataTransferObject\DataTransferObject;

class LoginDTO extends DataTransferObject
{
    public $email;
    public $username;
    public $mobile_phone;
    public $password;


    public static function fromRequest($request){
        return new self([
            'email' => $request['email'] ?? null,
            'username' => $request['username'] ?? null,
            'mobile_phone' => $request['mobile_phone'] ?? null,
            'password' => $request['password'],
        ]);
    }
}
