<?php


namespace App\Domain\Content\Categories\Category\Actions;

use App\Domain\Content\Categories\Category\DTO\CategoryDTO;
use App\Domain\Content\Categories\Category\Model\Category;
use App\Domain\Content\Categories\Category2Category\Actions\RemoveRelationAction;
use App\Domain\Content\Categories\Category2Category\Models\Category2Category;
use App\Domain\Content\Categories\CategoryPhotos\Actions\DeleteCategoryPhotoAction;
use App\Domain\Content\Categories\CategoryPhotos\Model\CategoryPhoto;
use App\Domain\Content\Categories\CategoryTranslation\Actions\DeleteCategoryTranlationAction;
use App\Domain\Content\Categories\CategoryTranslation\Model\CategoryTranslation;

use Illuminate\Support\Facades\Auth;

class DeleteCategoryAction
{


    public static function execute(
        CategoryDTO $categoryDTO
    ){
        $category_sons = Category2Category::where('parent_id',$categoryDTO->id)
                                            ->orWhere('son_id',$categoryDTO->id)
                                            ->get();
        $category_translations = CategoryTranslation::where('category_id',$categoryDTO->id)
                                            ->get();
        $category_photos = CategoryPhoto::where('category_id',$categoryDTO->id)
                                            ->get();

        foreach ($category_sons as $category_son){
            RemoveRelationAction::execute($category_son);
        }
        foreach ($category_photos as $category_photo){
            DeleteCategoryPhotoAction::execute($category_photo);
        }
        foreach ($category_translations as $category_translation){
            DeleteCategoryTranlationAction::execute($category_translation);
        }
        $category = Category::find($categoryDTO->id);
        $category->deleted_by_user_id = Auth::id();
        $category->save();
        $category->delete();
        return 'deleted successfully.';
    }
}
