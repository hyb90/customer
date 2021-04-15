<?php


namespace App\Http\ViewModels\Content\Categories\Categories;


use App\Domain\Content\Categories\Category\Model\Category;
use App\Domain\Content\Categories\Category2Category\Models\Category2Category;
use Illuminate\Contracts\Support\Arrayable;

class ShowRootCategoryVM implements  Arrayable
{
    private $roots ;

    public function __construct()
    {
        $this->roots = array();
        $sons = Category2Category::select('son_id')->groupBy('son_id')->get();
        $roots = Category::whereNotIn('id', $sons)->get();
        foreach ($roots as $root){
            $category = new ShowOneCategoryVM($root->id);
            array_push($this->roots,$category->toArray());
        }
    }

    public function toArray()
    {
        return $this->roots;
    }
}
