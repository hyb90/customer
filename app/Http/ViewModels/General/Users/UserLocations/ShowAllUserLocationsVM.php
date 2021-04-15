<?php


namespace App\Http\ViewModels\General\Users\UserLocations;


use App\Domain\General\Users\UserResion\Model\UserRegion;
use Illuminate\Contracts\Support\Arrayable;

class ShowAllUserLocationsVM implements Arrayable
{
    private $user_id ;

    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    private function get_user_locations(){
        return UserRegion::where('user_id',$this->user_id)->get();
    }
    public function toArray()
    {
        return [
            'user locations' => $this->get_user_locations()
        ];
    }

}
