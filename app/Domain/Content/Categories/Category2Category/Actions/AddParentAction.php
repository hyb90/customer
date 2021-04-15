<?php

namespace App\Domain\Content\Categories\Category2Category\Actions;

use App\Domain\Content\Categories\Category2Category\DTO\Category2CategoryDTO;
use App\Domain\Content\Categories\Category2Category\Models\Category2Category;
class AddParentAction
{
    public static function execute(
        Category2CategoryDTO $category
    ){
        $new_rel = new Category2Category($category->toArray());

        $new_rel->save();

        return $new_rel;
    }
}
