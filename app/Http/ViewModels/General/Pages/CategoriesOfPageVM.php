<?php


namespace App\Http\ViewModels\General\Pages;


use App\Domain\Content\Categories\Category\Model\Category;
use App\Domain\Content\Categories\CategoryPages\Model\CategoryPage;
use App\Domain\General\Pages\Model\Page;
use App\Http\ViewModels\Content\Categories\Categories\ShowOneCategoryVM;
use Illuminate\Contracts\Support\Arrayable;

class CategoriesOfPageVM implements Arrayable
{
    private $categories;

    public function __construct(Page $page)
    {
        $this->categories = array();
        $categoriesID = CategoryPage::select('category_id')->where('page_id',$page->id)->get();
        foreach ($categoriesID as $item){
            $category = new  ShowOneCategoryVM($item->category_id);
             array_push($this->categories,$category->toArray());
        }
    }
    public function toArray()
    {
        return [
          'categories' => $this->categories
        ];
    }

}
