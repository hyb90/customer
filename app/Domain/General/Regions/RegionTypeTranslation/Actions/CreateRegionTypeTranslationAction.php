<?php


namespace App\Domain\General\Regions\RegionTypeTranslation\Actions;


use App\Domain\General\Regions\RegionTypeTranslation\DTO\RegionTypeTranslationDTO;
use App\Domain\General\Regions\RegionTypeTranslation\Model\RegionTypeTranslation;
use Illuminate\Support\Facades\Auth;

class CreateRegionTypeTranslationAction
{
    public static function execute(
        RegionTypeTranslationDTO $regionTypeTranslationDTO
    ){
        $regionTypeTranslation = new RegionTypeTranslation($regionTypeTranslationDTO->toArray());
        $regionTypeTranslation->created_by_user_id = Auth::id();
        $regionTypeTranslation->save();
        return $regionTypeTranslation;
    }

}
