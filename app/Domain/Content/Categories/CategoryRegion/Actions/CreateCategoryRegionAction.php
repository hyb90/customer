<?php


namespace App\Domain\Content\Categories\CategoryRegion\Actions;


use App\Domain\Content\Categories\CategoryRegion\DTO\CategoryRegionDTO;
use App\Domain\Content\Categories\CategoryRegion\Model\CategoryRegion;
use Illuminate\Support\Facades\Auth;

class CreateCategoryRegionAction
{

    public static function execute(
        CategoryRegionDTO $categoryRegionDTO
    ){
        $category_region = new CategoryRegion($categoryRegionDTO->toArray());
        $category_region->created_by_user_id = Auth::id();
        $category_region->save();
        return $category_region;

    }

}
