<?php


namespace App\Http\ViewModels\Content\Categories\Categories;


use App\Domain\Content\Categories\Category\Model\Category;
use App\Domain\Content\Categories\CategoryPages\Model\CategoryPage;
use App\Domain\General\Pages\Model\Page;
use Illuminate\Contracts\Support\Arrayable;

class PagesOfCategoryVM implements Arrayable
{
    private $pages;


    public function __construct($category_id)
    {
        $pagesId = CategoryPage::select('page_id')->where('category_id',$category_id)->get();
        $this->pages = Page::whereIn('id',$pagesId)->get();
    }

    public function toArray()
    {
        return [
          'pages'  => $this->pages
        ];
    }

}
