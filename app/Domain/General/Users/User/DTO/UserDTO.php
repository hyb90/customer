<?php


namespace App\Domain\General\Users\User\DTO;


use Illuminate\Support\Facades\Hash;
use Spatie\DataTransferObject\DataTransferObject;

class UserDTO extends DataTransferObject
{
    public $id;
    public $username;
    public $email;
    public $password;
    public $c_password;
    public $avatar;
    public $mobile_phone;
    public $surname;
    public $birthdate;
    public $gender;
    public $address;
    public $role_id;
    public $region_id;
    public $default_lang_id;
    public $created_by_user_id;
    public $updated_by_user_id;
    public $deleted_by_user_id;

    public static function fromRequest($request){
        $password = null ;
        try {
            $password = Hash::make($request['password']);
        }catch (\Exception $e){
            $password = null ;
        }
        return new self([
            'id'           => $request['id'] ?? $request['user_id'] ?? null,
            'username'         => $request['username'] ?? null,
            'email'        => $request['email'] ?? null,
            'password'     => $password,
            'avatar'       => $request['avatar'] ?? null,
            'mobile_phone' => $request['mobile_phone'] ?? null,
            'surname'      => $request['surname'] ?? null,
            'birthdate'    => $request['birthdate'] ?? null,
            'gender'       => $request['gender'] ?? null,
            'address'      => $request['address'] ?? null,
            'role_id'      => $request['role_id'] ?? null,
            'region_id'      => $request['region_id'] ?? null,
            'default_lang_id'      => $request['default_lang_id'] ?? null,
            'created_by_user_id'=> $request['created_by_user_id'] ?? null ,
            'updated_by_user_id'=> $request['updated_by_user_id'] ?? null ,
            'deleted_by_user_id'=> $request['deleted_by_user_id'] ?? null ,
        ]);
    }

}
