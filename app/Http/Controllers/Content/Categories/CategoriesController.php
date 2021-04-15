<?php

namespace App\Http\Controllers\Content\Categories;

use App\Domain\Content\Categories\Category\Actions\CreateCategotyAction;
use App\Domain\Content\Categories\Category\Actions\DeleteCategoryAction;
use App\Domain\Content\Categories\Category\Actions\UpdateCategotyAction;
use App\Domain\Content\Categories\Category\DTO\CategoryDTO;
use App\Domain\Content\Categories\Category2Category\Actions\RemoveRelationAction;
use App\Domain\Content\Categories\Category2Category\DTO\Category2CategoryDTO;
use App\Domain\Content\Categories\CategoryPages\Actions\CreateCategoryPageAction;
use App\Domain\Content\Categories\CategoryPages\Actions\UpdateCategoryPageAction;
use App\Domain\Content\Categories\CategoryPages\DTO\CategoryPageDTO;
use App\Domain\Content\Categories\CategoryPages\Model\CategoryPage;
use App\Domain\Content\Categories\CategoryPhotos\Actions\CreateCategoryPhotoAction;
use App\Domain\Content\Categories\CategoryPhotos\Actions\UpdateCategoryPhotoAction;
use App\Domain\Content\Categories\CategoryPhotos\DTO\CategoryPhotoDTO;
use App\Domain\Content\Categories\CategoryPhotos\Model\CategoryPhoto;
use App\Domain\Content\Categories\CategoryRegion\Actions\CreateCategoryRegionAction;
use App\Domain\Content\Categories\CategoryRegion\Actions\UpdateCategoryRegionAction;
use App\Domain\Content\Categories\CategoryRegion\DTO\CategoryRegionDTO;
use App\Domain\Content\Categories\CategoryRegion\Model\CategoryRegion;
use App\Domain\Content\Categories\CategoryTranslation\Actions\CreateCategoryTranslationAction;
use App\Domain\Content\Categories\CategoryTranslation\Actions\UpdateCategoryTranslationAction;
use App\Domain\Content\Categories\CategoryTranslation\DTO\CategoryTranslationDTO;
use App\Domain\Content\Categories\CategoryTranslation\Model\CategoryTranslation;
use App\Domain\General\Pages\Model\Page;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Content\Categories\Categories\DestroyCategoryRequest;
use App\Http\Requests\Content\Categories\Categories\EditCategoryRequest;
use App\Http\Requests\Content\Categories\Categories\ShowCategoryRequest;
use App\Http\Requests\Content\Categories\Category2Categories\RemoveParentRequest;
use App\Http\Requests\Content\Categories\CategoryPages\AddPageRequest;
use App\Http\Requests\Content\Categories\CategoryTranslation\AddCategoryTranslationRequest;
use App\Http\Requests\General\Pages\CategoriesAtSpecificPageRequest;
use App\Http\ViewModels\Content\Categories\Categories\PagesOfCategoryVM;
use App\Http\ViewModels\Content\Categories\Categories\ShowOneCategoryVM;
use App\Http\ViewModels\Content\Categories\Categories\ShowSonsVM;
use App\Http\ViewModels\Content\Categories\Categories\ShowParentsVM;
use App\Http\ViewModels\General\Pages\CategoriesOfPageVM;
use Illuminate\Http\Request;
use App\Domain\Content\Categories\Category\Model\Category;
use App\Domain\Content\Categories\Category2Category\Models\Category2Category;
use App\Http\ViewModels\Content\Categories\Categories\CategoriesIndexVM;
use App\Http\Requests\Content\Categories\Categories\CreateCategoryRequest;
use App\Http\Requests\Content\Categories\Categories\UpdateCategoryRequest;
use App\Http\Requests\Content\Categories\Category2Categories\AddParentRequest;
use App\Domain\Content\Categories\Category2Category\Actions\AddParentAction;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $projectsIndexVM = new CategoriesIndexVM();
        $response = Helpers
                ::createSuccessResponse(
                $projectsIndexVM->toArray()
             );
        return response()->json($response, 200);

    }

    public function categories_of_page(CategoriesAtSpecificPageRequest $categoriesAtSpecificPageRequest){
        $page = Page::find($categoriesAtSpecificPageRequest->json('page_id'));
        $categories = new CategoriesOfPageVM($page);
        $response = Helpers::createSuccessResponse($categories->toArray());
        return response()->json($response,200);
    }
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function add_translation(AddCategoryTranslationRequest $addCategoryTranslationRequest){
        $categoryTranslations = $addCategoryTranslationRequest->json('category_translations');

        foreach ($categoryTranslations as $categoryTranslation){
            $categoryTranslation['created_by_user_id'] = Auth::id();
            $categoryTranslationDTO = CategoryTranslationDTO::fromRequest($categoryTranslation);
            $categoryTranslation = CreateCategoryTranslationAction::execute($categoryTranslationDTO);
        }


        $category = new ShowOneCategoryVM($categoryTranslationDTO->category_id);
        $response = Helpers::createSuccessResponse($category->toArray());

        return response()->json($response);
    }
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowCategoryRequest $showCategoryRequest)
    {
        $category = new ShowOneCategoryVM($showCategoryRequest->json('id'));
        $response = Helpers::createSuccessResponse($category->toArray());

        return response()->json($response,200);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(EditCategoryRequest $editCategoryRequest)
    {
        $category = new ShowOneCategoryVM($editCategoryRequest->json('id'));
        $respone = Helpers::createSuccessResponse($category->toArray());
        return response()->json($respone,200);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function create()
    {

        $parent_id = Category2Category::select('id')->where('parent_id', 5)->first()->id;
        return response()->json(Array('json' => $parent_id));
    }
    public function store(CreateCategoryRequest $createCategoryRequest)
    {

        $categoryDTO = CategoryDTO::fromRequest($createCategoryRequest->json()->all());
        $category = CreateCategotyAction::execute($categoryDTO);
        $createCategoryRequest->json()->add(['category_id' => $category->id]) ;

        if($createCategoryRequest->json()->has('parent_ids')){
            foreach ($createCategoryRequest->json('parent_ids') as $parent) {
                $parent['son_id'] = $category->id ;
                $category2CategoryDTO = Category2CategoryDTO::fromRequest($parent);
                $category_parent = AddParentAction::execute($category2CategoryDTO);
            }
        }

        foreach ($createCategoryRequest->json('names') as $name) {
            $name['category_id']= $category->id;
            $categoryTranslationDTO = CategoryTranslationDTO::fromRequest($name);
            $categoryTranslation = CreateCategoryTranslationAction::execute($categoryTranslationDTO);
        }
        foreach ($createCategoryRequest->json('category_photos') as $category_photo) {
            $category_photo['category_id']= $category->id;
            $categoryPhotoDTO = CategoryPhotoDTO::fromRequest($category_photo);
            $categoryPhoto = CreateCategoryPhotoAction::execute($categoryPhotoDTO);
        }
        foreach ($createCategoryRequest->json('category_regions') as $category_region) {
            $category_region['category_id']= $category->id;
            $categoryRegionDTO = CategoryRegionDTO::fromRequest($category_region);
            $categoryRegion = CreateCategoryRegionAction::execute($categoryRegionDTO);
        }
        foreach ($createCategoryRequest->json('category_pages') as $category_page) {
            $category_page['category_id']= $category->id;
            $categoryPageDTO = CategoryPageDTO::fromRequest($category_page);
            $categoryRegion = CreateCategoryPageAction::execute($categoryPageDTO);
        }

        $category = new ShowOneCategoryVM($category->id);
        $response = Helpers::createSuccessResponse($category->toArray());
        return response()->json($response, 200);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCategoryRequest $updateCategoryRequest)
    {
        $categoryDTO = CategoryDTO::fromRequest($updateCategoryRequest->json()->all());
        $category = UpdateCategotyAction::execute($categoryDTO);

        foreach ($updateCategoryRequest->json('names') as $name) {
            $name['category_id']= $category->id;

            $categoryTranslationDTO = CategoryTranslationDTO::fromRequest($name);
            $categoryTranslation = UpdateCategoryTranslationAction::execute(CategoryTranslation::find($name['id']), $categoryTranslationDTO);
        }
        foreach ($updateCategoryRequest->json('category_photos') as $category_photo) {
            $category_photo['category_id']= $category->id;

            $categoryPhotoDTO = CategoryPhotoDTO::fromRequest($category_photo);
            $categoryPhoto = UpdateCategoryPhotoAction::execute(CategoryPhoto::find($category_photo['id']), $categoryPhotoDTO);
        }
        foreach ($updateCategoryRequest->json('category_regions') as $category_region) {
            $category_region['category_id']= $category->id;
            $categoryRegionDTO = CategoryRegionDTO::fromRequest($category_region);
            $categoryRegion = UpdateCategoryRegionAction::execute(CategoryRegion::find($category_region['id']),$categoryRegionDTO);
        }
        foreach ($updateCategoryRequest->json('category_pages') as $category_page) {
            $category_page['category_id']= $category->id;
            $categoryPageDTO = CategoryPageDTO::fromRequest($category_page);
            $categoryRegion = UpdateCategoryPageAction::execute(CategoryPage::find($category_page['id']),$categoryPageDTO);
        }

        $category = new ShowOneCategoryVM($categoryDTO);
        $response = Helpers::createSuccessResponse($category->toArray());
        return response()->json($response, 200);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DestroyCategoryRequest $destroyCategoryRequest)
    {
        $categoryDTO = CategoryDTO::fromRequest($destroyCategoryRequest->json()->all());

        $response = DeleteCategoryAction::execute($categoryDTO);

        return response()->json($response,200);

    }

    public function add_page(AddPageRequest $addPageRequest){
        $categoryPageDTO = CategoryPageDTO::fromRequest($addPageRequest->json()->all());
        $categoryPage = CreateCategoryPageAction::execute($categoryPageDTO);

        $categoryDTO = CategoryDTO::fromRequest(['id' => $categoryPageDTO->category_id]);
        $category = new ShowOneCategoryVM($categoryDTO);

        $response = Helpers::createSuccessResponse($category->toArray());

        return response()->json($response);
    }


}
