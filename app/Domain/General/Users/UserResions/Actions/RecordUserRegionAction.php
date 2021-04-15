<?php


namespace App\Domain\General\Users\UserResions\Actions;


use App\Domain\General\Users\UserResions\DTO\UserRegionDTO;
use App\Domain\General\Users\UserResions\Model\UserRegion;

class RecordUserRegionAction
{

    public static function execute(
        UserRegionDTO $userRegionDTO
    ){
        $userRegion = new UserRegion($userRegionDTO->toArray());
        $userRegion->save();
        return $userRegion;
    }
}
