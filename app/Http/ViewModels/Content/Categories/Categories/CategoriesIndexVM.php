<?php


namespace App\Http\ViewModels\Content\Categories\Categories;

use App\Domain\Content\Categories\Category\Model\Category;
use Illuminate\Contracts\Support\Arrayable;
use App\Domain\Content\Categories\Category2Category\Models\Category2Category;

class CategoriesIndexVM implements Arrayable
{
    private $all_categories;

    public function __construct(){
        $this->all_categories = array() ;
        $categories = Category::all();
        foreach ($categories as $category)
        {
            $category_parents = Category2Category::where('son_id',$category->id)->get();
            if(count($category_parents) == 0) {
                $category = new ShowOneCategoryVM($category->id);
                array_push($this->all_categories, $category->toArray()['category']);
            }
        }
    }

    public function toArray(){
        return [
            'Categories' =>$this->all_categories
        ];
    }
}
