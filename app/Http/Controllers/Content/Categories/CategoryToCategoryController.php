<?php

namespace App\Http\Controllers\Content\Categories;

use App\Domain\Content\Categories\Category\Model\Category;
use App\Domain\Content\Categories\Category2Category\Actions\AddParentAction;
use App\Domain\Content\Categories\Category2Category\Actions\RemoveRelationAction;
use App\Domain\Content\Categories\Category2Category\DTO\Category2CategoryDTO;
use App\Domain\Content\Categories\Category2Category\Models\Category2Category;
use App\Exceptions\RequestException;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Content\Categories\Category2Categories\AddParentRequest;
use App\Http\Requests\Content\Categories\Category2Categories\RemoveParentRequest;
use App\Http\ViewModels\Content\Categories\Categories\ShowParentsVM;
use App\Http\ViewModels\Content\Categories\Categories\ShowRootCategoryVM;
use App\Http\ViewModels\Content\Categories\Categories\ShowSonsVM;
use Illuminate\Http\Request;

class CategoryToCategoryController extends Controller
{

    /**
     * Display the specified resource By Parent_id.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show_root()
    {

            $root = new ShowRootCategoryVM();

            return response()->json($root->toArray());

    }

    /**
     * Display the specified resources By Parent_id.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function show_sons(Category $category)
    {
        $data = new ShowSonsVM($category);

        $response = Helpers::createSuccessResponse($data->toArray());

        return response()->json($response,200);
    }

    /**
     * Display the specified resources By Son_id.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show_parents(Category $category)
    {

        $data = new ShowParentsVM($category);

        $response = Helpers::createSuccessResponse($data->toArray());

        return response()->json($response,200);
    }

    /**
     * index new parent to specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function add_parent(AddParentRequest $addParentRequest)
    {
        $category2categoryDTO = Category2CategoryDTO::fromRequest($addParentRequest->json()->all());
        $data = AddParentAction::execute($category2categoryDTO);
        $responst = Helpers::createSuccessResponse($data) ;

        return response()->json($responst,200);
    }

    /**
     * remove parent to specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function rem_parent(RemoveParentRequest $removeParentRequest)
    {
        $category2categoryDTO = Category2CategoryDTO::fromRequest($removeParentRequest);
        $data = RemoveRelationAction::execute($category2categoryDTO);
        $responst = Helpers::createSuccessResponse($data) ;

        return response()->json($responst,200);
    }

}
