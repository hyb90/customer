<?php


namespace App\Http\ViewModels\Content\Categories\Categories;


use App\Domain\Content\Categories\Category\DTO\CategoryDTO;
use App\Domain\Content\Categories\Category2Category\Models\Category2Category;
use App\Domain\Content\Categories\CategoryPages\Model\CategoryPage;
use App\Domain\Content\Categories\CategoryPhotos\Model\CategoryPhoto;
use App\Domain\Content\Categories\CategoryRegion\Model\CategoryRegion;
use App\Domain\Content\Categories\CategoryTranslation\Model\CategoryTranslation;
use Illuminate\Contracts\Support\Arrayable;
use App\Domain\Content\Categories\Category\Model\Category;

class ShowOneCategoryVM implements Arrayable
{
    private $category;

    public function __construct($categoryID)
    {
        $this->category = Category::with(['category_translations','category_photos','category_pages','category_region'])->find($categoryID);
    }
    // helper functions
    public function get_parents($category,$category_path,&$category_paths)
    {
        $parent_ids = Category2Category::select('parent_id')->where('son_id', $category->id)->get();
        $parent_categories = Category::whereIn('id', $parent_ids)->get();

        if(count($parent_categories) == 0){
            array_push($category_paths,$category_path);
        }

        foreach ($parent_categories as $category) {
            $this->get_parents($category,$category->category_translations->first()->category_name.' \\ '.$category_path,$category_paths) ;
        }
    }
    public function get_sub_categories($category){
        $sub_categories_ids = Category2Category::where('parent_id',$category->id)->pluck('son_id')->all();
        $sub_categories = Category::whereIn('id',$sub_categories_ids)->get();
        $filled_sub_categories = array();
        foreach ($sub_categories as $sub_category){
            $temp_category = new ShowOneCategoryVM($sub_category->id);
            array_push($filled_sub_categories,$temp_category->toArray()['category']);
        }
            $category->setAttribute('sub_categories',$filled_sub_categories);
    }
    private function get_paths(){
        $category_paths = array();
        $this->get_parents($this->category,$this->category->category_translations()->first()->category_name,$category_paths);
        $this->category->setAttribute('category_paths',$category_paths);
    }
    private function get_sons(){
        $this->get_sub_categories($this->category);
    }
    private function fill_category(){
        $this->get_paths();
        $this->get_sons();
        return $this->category;
    }
    public function toArray()
    {
        return [
            'category' => $this->fill_category()
        ];
    }

}
