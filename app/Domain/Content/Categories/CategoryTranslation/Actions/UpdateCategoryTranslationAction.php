<?php


namespace App\Domain\Content\Categories\CategoryTranslation\Actions;


use App\Domain\Content\Categories\Category\Model\Category;
use App\Domain\Content\Categories\CategoryTranslation\DTO\CategoryTranslationDTO;
use App\Domain\Content\Categories\CategoryTranslation\Model\CategoryTranslation;
use Illuminate\Support\Facades\Auth;

class UpdateCategoryTranslationAction
{
    public static function execute(
        CategoryTranslation $categoryTranslation,
        CategoryTranslationDTO $categoryTranslationDTO
    ){

        $categoryTranslation->update($categoryTranslationDTO->toArray());
        $name['updated_by_user_id'] = Auth::id();

        $categoryTranslation->save();
        return $categoryTranslation;
    }
}
