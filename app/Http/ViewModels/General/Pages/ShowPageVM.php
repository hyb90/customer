<?php


namespace App\Http\ViewModels\General\Pages;


use App\Domain\Content\Categories\CategoryPages\Model\CategoryPage;
use App\Domain\General\Pages\Model\Page;
use Illuminate\Contracts\Support\Arrayable;

class ShowPageVM implements Arrayable
{
    private $page;
    public function __construct(Page $page)
    {
        $this->page = $page;
        $this->page->setAttribute('categories',CategoryPage::where('page_id',$page->id));

    }

    public function toArray()
    {
        return [
            'page' => $this->page
        ];
    }

}
