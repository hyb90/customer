<?php

namespace App\Domain\Content\Categories\Category2Category\Actions ;
use App\Domain\Content\Categories\Category2Category\DTO\Category2CategoryDTO;
use App\Domain\Content\Categories\Category2Category\Models\Category2Category;
use Illuminate\Support\Facades\Auth;

class RemoveRelationAction
{
    public static function execute(
        Category2Category $category2Category
    ){

        $category2Category->deleted_by_user_id = Auth::id();
        $category2Category->save();
        $category2Category->delete();
        return "deleted successfully." ;
    }
}
