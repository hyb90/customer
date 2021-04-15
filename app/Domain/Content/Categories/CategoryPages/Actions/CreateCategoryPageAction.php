<?php


namespace App\Domain\Content\Categories\CategoryPages\Actions;


use App\Domain\Content\Categories\CategoryPages\DTO\CategoryPageDTO;
use App\Domain\Content\Categories\CategoryPages\Model\CategoryPage;
use Illuminate\Support\Facades\Auth;

class CreateCategoryPageAction
{


    public static function execute(
        CategoryPageDTO $categoryPageDTO
    ){
        $categoryPage = new CategoryPage($categoryPageDTO->toArray());
        $categoryPage->created_by_user_id = Auth::id();
        $categoryPage->save();
        return $categoryPage;
    }
}
