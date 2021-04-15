<?php


namespace App\Http\Controllers\Employees\SalaryTypes;


use App\Helpers\Helpers;
use App\Domain\Employees\SalaryTypes\Actions\CreateSalaryTypeAction;
use App\Domain\Employees\SalaryTypes\Actions\DeleteSalaryTypeAction;
use App\Domain\Employees\SalaryTypes\Actions\UpdateSalaryTypeAction;
use App\Domain\Employees\SalaryTypes\DTO\SalaryTypeDTO;
use App\Http\Requests\SalaryTypes\CreateSalaryTypeRequest;
use App\Http\Requests\Employees\SalaryTypes\UpdateSalaryTypeRequest;
use App\Http\Requests\Employees\SalaryTypes\DestroySalaryTypeRequest;
use App\Http\Requests\SalaryTypes\ShowSalaryTypeRequest;
use App\Http\Requests\SalaryTypes\EditSalaryTypeRequest;
use App\Http\ViewModels\SalaryTypes\ShowSalaryTypeVM;
use App\Http\ViewModels\SalaryTypes\ShowAllSalaryTypesVM;

class SalaryTypesController
{

    public function index(){
        $SalaryTypes = new ShowAllSalaryTypesVM();
        $response = Helpers::createSuccessResponse($SalaryTypes->toArray());

        return response()->json($response);
    }

    public function show(ShowSalaryTypeRequest $showSalaryTypeRequest){
        $SalaryTypeDTO = SalaryTypeDTO::fromRequest($showSalaryTypeRequest->json()->all());
        $SalaryType = new ShowSalaryTypeVM($SalaryTypeDTO->id);
        $response = Helpers::createSuccessResponse($SalaryType->toArray());

        return response()->json($response);
    }

    public function edit(EditSalaryTypeRequest $editSalaryTypeRequest){
        $SalaryTypeDTO = SalaryTypeDTO::fromRequest($editSalaryTypeRequest->json()->all());
        $SalaryType = new ShowSalaryTypeVM($SalaryTypeDTO->id);
        $response = Helpers::createSuccessResponse($SalaryType->toArray());

        return response()->json($response);
    }

    public function create(CreateSalaryTypeRequest $createSalaryTypeRequest){
        $SalaryTypeDTO = SalaryTypeDTO::fromRequest($createSalaryTypeRequest->json()->all());

        $SalaryType = CreateSalaryTypeAction::execute($SalaryTypeDTO);

        $SalaryType = new ShowSalaryTypeVM($SalaryType->id);

        $response = Helpers::createSuccessResponse($SalaryType->toArray());

        return response()->json($response);
    }

    public function update(UpdateSalaryTypeRequest $updateSalaryTypeRequest){
        $SalaryTypeDTO = SalaryTypeDTO::fromRequest($updateSalaryTypeRequest->json()->all());

        $SalaryType = UpdateSalaryTypeAction::execute($SalaryTypeDTO);

        $SalaryType = new ShowSalaryTypeVM($SalaryType->id);

        $response = Helpers::createSuccessResponse($SalaryType);

        return response()->json($response);
    }

    public function destroy(DestroySalaryTypeRequest $destroySalaryTypeRequest){
        $SalaryTypeDTO = SalaryTypeDTO::fromRequest($destroySalaryTypeRequest->json()->all());

        $SalaryType = DeleteSalaryTypeAction::execute($SalaryTypeDTO);

        $response =Helpers::createSuccessResponse($SalaryType);

        return response()->json($response);
    }

}
