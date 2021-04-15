<?php


namespace App\Domain\Content\Categories\CategoryPhotos\Actions;


use App\Domain\Content\Categories\CategoryPhotos\Model\CategoryPhoto;
use Illuminate\Support\Facades\Auth;

class DeleteCategoryPhotoAction
{
    public static function execute(
        CategoryPhoto $categoryPhoto
    ){
        $categoryPhoto->deleted_by_user_id = Auth::id();
        $categoryPhoto->save();
        $categoryPhoto->delete();
        return "deleted successfully." ;
    }
}
