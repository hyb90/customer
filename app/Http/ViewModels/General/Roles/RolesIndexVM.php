<?php


namespace App\Http\ViewModels\General\Roles;


use App\Models\Role;
use Illuminate\Contracts\Support\Arrayable;

class RolesIndexVM implements Arrayable
{
    private $roles ;

    public function __construct()
    {
       $this->roles =Role::all();
    }

    public function toArray()
    {
        return [
            'roles' => $this->roles
        ];
    }

}
