<?php


namespace App\Domain\Content\Categories\Category\Actions;


use App\Domain\Content\Categories\Category\Model\Category;
use App\Domain\Content\Categories\Category\DTO\CategoryDTO;
use Illuminate\Support\Facades\Auth;

class UpdateCategotyAction
{
    public static function execute(
        CategoryDTO $categoryDTO
    ){
        $category = Category::find($categoryDTO->id);
        $category->update($categoryDTO->toArray());
        $category->updated_by_user_id = Auth::id();
        $category->save() ;

        return $category;
    }
}
