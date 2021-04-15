<?php


namespace App\Http\ViewModels\Content\Categories\Categories;


use Illuminate\Contracts\Support\Arrayable;
use App\Domain\Content\Categories\Category2Category\Models\Category2Category;
use App\Domain\Content\Categories\Category\Model\Category;
class ShowParentsVM implements Arrayable
{

    private $categories;

    public function __construct(Category $category)
    {
        $this->categories = array();
        $this->get_parents($category->id);

    }

    private function get_parents($category_id){
        $categories_ids = Category2Category::select('parent_id')->where('son_id', $category_id)->get();
        $categories = Category::whereIn('id', $categories_ids)->get();
        foreach($categories as $category){
            $one_category =new ShowOneCategoryVM($category->id);
            array_push($this->categories,$one_category->toArray()['category']);
        }

    }

    public function toArray()
    {
        return $this->categories;
    }
}
