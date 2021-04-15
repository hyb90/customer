<?php


namespace App\Domain\Content\Categories\Category\Actions;

use App\Domain\Content\Categories\Category\DTO\CategoryDTO;
use App\Domain\Content\Categories\Category\Model\Category;
use Illuminate\Support\Facades\Auth;

class CreateCategotyAction
{
    public static function execute(
        CategoryDTO $categoryDTO
    ){
        $new_category = new Category($categoryDTO->toArray());
        $new_category->created_by_user_id = Auth::id();
        $new_category->save();
        return $new_category ;
    }
}
