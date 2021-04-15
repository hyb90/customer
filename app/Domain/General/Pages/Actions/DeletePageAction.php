<?php


namespace App\Domain\General\Pages\Actions;


use App\Domain\General\Pages\Model\Page;
use Illuminate\Support\Facades\Auth;

class DeletePageAction
{


    public static function execute(Page $page){
        $page->deleted_by_user_id = Auth::id();
        $page->save();
        $page->delete();
        return "deleted successfully.";
    }
}
