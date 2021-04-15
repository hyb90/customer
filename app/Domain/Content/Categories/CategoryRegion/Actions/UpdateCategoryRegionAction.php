<?php


namespace App\Domain\Content\Categories\CategoryRegion\Actions;


use App\Domain\Content\Categories\CategoryRegion\DTO\CategoryRegionDTO;
use App\Domain\Content\Categories\CategoryRegion\Model\CategoryRegion;
use Illuminate\Support\Facades\Auth;

class UpdateCategoryRegionAction
{
    public static function execute(
        CategoryRegion $categoryRegion,
        CategoryRegionDTO $categoryRegionDTO
    ){

        $categoryRegion->update($categoryRegionDTO->toArray());
        $categoryRegion->updated_by_user_id = Auth::id();

        $categoryRegion->save();
        return $categoryRegion;
    }
}
