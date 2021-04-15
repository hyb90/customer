<?php


namespace App\Http\ViewModels\General\Users;


use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Support\Arrayable;

class ShowAllUsersVM implements Arrayable
{
    private $type;

    public function __construct($type = "users")
    {
        $this->type = $type;
    }

    private function get_users(){
        $users = Array();
        $result = Array();
        switch (strtolower($this->type)){
            case 'users':
                $users = User::all();
                foreach ($users as $user) {
                    $userVM = new ShowUserVM($user,$user->role()->first()->name);
                    $user = $userVM->toArray()['user'];
                    array_push($result,$user);
                }
                break;
            case 'employees':
                $users = User::where('role_id','<>',Role::get_role_id('customer'))
                    ->where('role_id','<>',Role::get_role_id('admin'))->get();
                foreach ($users as $user) {
                    $user = new ShowUserVM($user,'employee');
                    $user = $user->toArray()['user'];
                    array_push($result,$user);
                }

                break;
            case 'customers':
                $users = User::where('role_id',Role::get_role_id('customer'));
                foreach ($users as $user) {
                    $user = new ShowUserVM($user,'customer');
                    $user = $user->toArray()['user'];
                    array_push($result,$user);
                }
                break;
            case 'admins':
                $users = User::where('role_id',Role::get_role_id('admin'));
                foreach ($users as $user) {
                    $user = new ShowUserVM($user,'admin');
                    $user = $user->toArray()['user'];
                    array_push($result,$user);

                }
                break;
        }
        return $result;

    }

    public function toArray()
    {
        return [
            'users' => $this->get_users()
        ];
    }
}
