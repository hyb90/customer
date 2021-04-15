<?php


namespace App\Domain\Content\Categories\CategoryPhotos\Actions;


use App\Domain\Content\Categories\CategoryPhotos\DTO\CategoryPhotoDTO;
use App\Domain\Content\Categories\CategoryPhotos\Model\CategoryPhoto;
use Illuminate\Support\Facades\Auth;

class CreateCategoryPhotoAction
{
    public static function execute(
        CategoryPhotoDTO $categoryPhotoDTO
    ){
        $new_category_photo = new CategoryPhoto($categoryPhotoDTO->toArray());
        $new_category_photo->created_by_user_id = Auth::id();
        $new_category_photo->save();
        return $new_category_photo ;
    }
}
