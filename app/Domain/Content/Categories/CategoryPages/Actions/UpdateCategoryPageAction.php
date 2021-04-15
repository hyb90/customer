<?php


namespace App\Domain\Content\Categories\CategoryPages\Actions;


use App\Domain\Content\Categories\CategoryPages\DTO\CategoryPageDTO;
use App\Domain\Content\Categories\CategoryPages\Model\CategoryPage;
use Illuminate\Support\Facades\Auth;

class UpdateCategoryPageAction
{
    public static function execute(
        CategoryPage $categoryPage,
        CategoryPageDTO $categoryPageDTO
    ){

        $categoryPage->update($categoryPageDTO->toArray());
        $categoryPage->updated_by_user_id = Auth::id();

        $categoryPage->save();
        return $categoryPage;
    }
}
