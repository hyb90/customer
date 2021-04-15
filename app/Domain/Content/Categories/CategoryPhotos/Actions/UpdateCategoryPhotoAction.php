<?php


namespace App\Domain\Content\Categories\CategoryPhotos\Actions;


use App\Domain\Content\Categories\CategoryPhotos\DTO\CategoryPhotoDTO;
use App\Domain\Content\Categories\CategoryPhotos\Model\CategoryPhoto;
use Illuminate\Support\Facades\Auth;

class UpdateCategoryPhotoAction
{
    public static function execute(
        CategoryPhoto $categoryPhoto,
        CategoryPhotoDTO $categoryPhotoDTO
    ){

        $categoryPhoto->update($categoryPhotoDTO->toArray());
        $category_photo['updated_by_user_id'] = Auth::id();

        $categoryPhoto->save();
        return $categoryPhoto;
    }
}
