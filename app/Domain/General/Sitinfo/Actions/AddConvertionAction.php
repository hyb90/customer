<?php


namespace App\Domain\General\Sitinfo\Actions;


use App\Domain\General\Sitinfo\DTO\SitinfoDTO;
use App\Domain\General\Sitinfo\Model\Sitinfo;
use Illuminate\Support\Facades\Auth;

class AddConvertionAction
{

    public static function execute(SitinfoDTO $sitinfoDTO){
         $sitinfo = new Sitinfo($sitinfoDTO->toArray());
         $sitinfo->created_by_user_id = Auth::id();
         $sitinfo->save();
         return $sitinfo ;
    }
}
