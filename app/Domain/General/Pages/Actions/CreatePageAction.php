<?php


namespace App\Domain\General\Pages\Actions;


use App\Domain\General\Pages\DTO\PageDTO;
use App\Domain\General\Pages\Model\Page;
use Illuminate\Support\Facades\Auth;

class CreatePageAction
{

    public static function execute(
        PageDTO $pagesDTO
    ){
        $page = new Page($pagesDTO->toArray());
        $page->save();
        return $page;
    }
}
