<?php


namespace App\Domain\General\Regions\RegionTypeTranslation\Actions;


use App\Domain\General\Regions\RegionTypeTranslation\DTO\RegionTypeTranslationDTO;
use App\Domain\General\Regions\RegionTypeTranslation\Model\RegionTypeTranslation;
use Illuminate\Support\Facades\Auth;

class UpdateRegionTypeTranslationAction
{
    public static function execute(
        RegionTypeTranslation $regionTypeTranslation,
        RegionTypeTranslationDTO $regionTypeTranslationDTO
    ){
        $regionTypeTranslation->update($regionTypeTranslationDTO->toArray());
        $regionTypeTranslation->updated_by_user_id = Auth::id();
        $regionTypeTranslation->save();

        return $regionTypeTranslation ;
    }
}
