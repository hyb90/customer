<?php


namespace App\Domain\Content\Categories\CategoryTranslation\Actions;


use App\Domain\Content\Categories\CategoryTranslation\DTO\CategoryTranslationDTO;
use App\Domain\Content\Categories\CategoryTranslation\Model\CategoryTranslation;
use Illuminate\Support\Facades\Auth;

class CreateCategoryTranslationAction
{

public static function execute(
    CategoryTranslationDTO $categoryTranslationDTO
){

    $new_category_translation = new CategoryTranslation($categoryTranslationDTO->toArray());
    $new_category_translation->created_by_user_id= Auth::id();
    $new_category_translation->save();
    return $new_category_translation ;
}

}
