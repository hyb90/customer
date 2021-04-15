<?php


namespace App\Domain\General\Regions\RegionTranslation\Actions;


use App\Domain\General\Regions\RegionTranslation\DTO\RegionTranslationDTO;
use App\Domain\General\Regions\RegionTranslation\Model\RegionTranslation;
use Illuminate\Support\Facades\Auth;

class UpdateRegionTranslationAction
{
    public static function execute(
        RegionTranslation $regionTranslation,
        RegionTranslationDTO $regionTranslationDTO
    ){
        $regionTranslation->update($regionTranslationDTO->toArray());
        $regionTranslation->updated_by_user_id = Auth::id();
        $regionTranslation->save();
        return $regionTranslation;
    }
}
