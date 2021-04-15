<?php


namespace App\Domain\General\Regions\RegionTranslation\Actions;


use App\Domain\General\Regions\RegionTranslation\DTO\RegionTranslationDTO;
use App\Domain\General\Regions\RegionTranslation\Model\RegionTranslation;
use Illuminate\Support\Facades\Auth;

class CreateRegionTranslationAction
{
    public static function execute(
        RegionTranslationDTO $regionTranslationDTO
    ){
        $regionTranslation = new RegionTranslation($regionTranslationDTO->toArray());
        $regionTranslation->created_by_user_id = Auth::id();
        $regionTranslation->save();
        return $regionTranslation;
    }
}
