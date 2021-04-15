<?php


namespace App\Domain\General\Pages\Actions;


use App\Domain\General\Pages\DTO\PageDTO;
use App\Domain\General\Pages\Model\Page;
use Illuminate\Support\Facades\Auth;

class UpdatePageAction
{

    public static function execute(
        Page $page,
        PageDTO $pagesDTO
    ){
        $page->update($pagesDTO->toArray());
        $page->updated_by_user_id = Auth::id();
        $page->save();
        return $page;
    }
}
