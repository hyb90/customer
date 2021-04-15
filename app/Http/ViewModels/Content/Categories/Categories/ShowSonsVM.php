<?php


namespace App\Http\ViewModels\Content\Categories\Categories;


use Illuminate\Contracts\Support\Arrayable;
use App\Domain\Content\Categories\Category\Model\Category;
use App\Domain\Content\Categories\Category2Category\Models\Category2Category;

class ShowSonsVM implements Arrayable
{

    private $categories;
    public function __construct(Category $category)
    {
        $this->categories = array();
        $this->get_sons($category->id);
    }

        private function get_sons($category_id){
        $categories_ids = Category2Category::select('son_id')->where('parent_id', $category_id)->get();
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
