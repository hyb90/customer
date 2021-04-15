<?php

namespace App\Http\Controllers\General\Pages;

use App\Domain\Content\Categories\Category\Model\Category;
use App\Domain\General\Pages\Actions\CreatePageAction;
use App\Domain\General\Pages\Actions\DeletePageAction;
use App\Domain\General\Pages\Actions\UpdatePageAction;
use App\Domain\General\Pages\DTO\PageDTO;
use App\Domain\General\Pages\Model\Page;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\General\Pages\CategoriesAtSpecificPageRequest;
use App\Http\Requests\General\Pages\CreatePageRequest;
use App\Http\Requests\General\Pages\DeletePageRequest;
use App\Http\Requests\General\Pages\EditPageRequest;
use App\Http\Requests\General\Pages\UpdatePageRequest;
use App\Http\ViewModels\Content\Categories\Categories\PagesOfCategoryVM;
use App\Http\ViewModels\General\Pages\CategoriesOfPageVM;
use App\Http\ViewModels\General\Pages\PagesIndexVM;
use App\Http\ViewModels\General\Pages\ShowPageVM;
use Illuminate\Http\Request;

class PagesController extends Controller
{


    public function create_page(CreatePageRequest $createPageRequest){
        $pageDTO = PageDTO::fromRequest($createPageRequest);
        $page = CreatePageAction::execute($pageDTO);
        $response = Helpers::createSuccessResponse($page);

        return response()->json($response);
    }
    public function delete_page(DeletePageRequest $deletePageRequest){
        $page = Page::find($deletePageRequest->json('page_id'));
        $page = DeletePageAction::execute($page);
        $response = Helpers::createSuccessResponse($page);

        return response()->json($response);
    }
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function pages_of_category(Category $category)
    {
        $pagesVM = new PagesOfCategoryVM($category->id);
        $response = Helpers
            ::createSuccessResponse(
                $pagesVM->toArray()
            );
        return response()->json($response, 200);

    }
    public function index(){
        $pages = new PagesIndexVM();
        $response = Helpers::createSuccessResponse($pages->toArray());
        return response()->json($response,200);
    }
    public function update(UpdatePageRequest $updatePageRequest){
        $pageDTO = PageDTO::fromRequest($updatePageRequest);
        $page = UpdatePageAction::execute(Page::find($updatePageRequest->json('id')),$pageDTO);
        $response = Helpers::createSuccessResponse($page);
        return response()->json($response,200);
    }
    public function edit(EditPageRequest $editPageRequest){
        $page = new ShowPageVM(Page::find($editPageRequest->json('id')));
        $response = Helpers::createSuccessResponse($page->toArray());
        return response()->json($response,200);
    }
}
