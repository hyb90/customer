<?php


namespace App\Domain\Content\Categories\CategoryTranslation\Actions;


use App\Domain\Content\Categories\CategoryTranslation\Model\CategoryTranslation;
use Illuminate\Support\Facades\Auth;

class DeleteCategoryTranlationAction
{
    public static function execute(
        CategoryTranslation $categoryTranslation
    ){
        $categoryTranslation->deleted_by_user_id = Auth::id();
        $categoryTranslation->save();
        $categoryTranslation->delete();
        return "deleted successfully." ;
    }
}
