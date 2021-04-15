<?php


namespace App\Http\Controllers\Customers\CustomerTypes;


use App\Helpers\Helpers;
use App\Domain\Customers\CustomerTypes\Actions\CreateCustomerTypeAction;
use App\Domain\Customers\CustomerTypes\Actions\DeleteCustomerTypeAction;
use App\Domain\Customers\CustomerTypes\Actions\UpdateCustomerTypeAction;
use App\Domain\Customers\CustomerTypes\DTO\CustomerTypeDTO;
use App\Http\Requests\Customers\CustomerTypes\CreateCustomerTypeRequest;
use App\Http\Requests\Customers\CustomerTypes\UpdateCustomerTypeRequest;
use App\Http\Requests\Customers\CustomerTypes\DestroyCustomerTypeRequest;
use App\Http\Requests\Customers\CustomerTypes\ShowCustomerTypeRequest;
use App\Http\Requests\Customers\CustomerTypes\EditCustomerTypeRequest;
use App\Http\ViewModels\Customers\CustomerTypes\ShowCustomerTypeVM;
use App\Http\ViewModels\Customers\CustomerTypes\ShowAllCustomerTypesVM;

class CustomerTypesController
{

    public function index(){
        $CustomerTypes = new ShowAllCustomerTypesVM();
        $response = Helpers::createSuccessResponse($CustomerTypes->toArray());

        return response()->json($response);
    }

    public function show(ShowCustomerTypeRequest $showCustomerTypeRequest){
        $CustomerTypeDTO = CustomerTypeDTO::fromRequest($showCustomerTypeRequest->json()->all());
        $CustomerType = new ShowCustomerTypeVM($CustomerTypeDTO->id);
        $response = Helpers::createSuccessResponse($CustomerType->toArray());

        return response()->json($response);
    }

    public function edit(EditCustomerTypeRequest $editCustomerTypeRequest){
        $CustomerTypeDTO = CustomerTypeDTO::fromRequest($editCustomerTypeRequest->json()->all());
        $CustomerType = new ShowCustomerTypeVM($CustomerTypeDTO->id);
        $response = Helpers::createSuccessResponse($CustomerType->toArray());

        return response()->json($response);
    }

    public function create(CreateCustomerTypeRequest $createCustomerTypeRequest){
        $CustomerTypeDTO = CustomerTypeDTO::fromRequest($createCustomerTypeRequest->json()->all());

        $CustomerType = CreateCustomerTypeAction::execute($CustomerTypeDTO);

        $CustomerType = new ShowCustomerTypeVM($CustomerType->id);

        $response = Helpers::createSuccessResponse($CustomerType->toArray());

        return response()->json($response);
    }

    public function update(UpdateCustomerTypeRequest $updateCustomerTypeRequest){
        $CustomerTypeDTO = CustomerTypeDTO::fromRequest($updateCustomerTypeRequest->json()->all());

        $CustomerType = UpdateCustomerTypeAction::execute($CustomerTypeDTO);

        $CustomerType = new ShowCustomerTypeVM($CustomerType->id);

        $response = Helpers::createSuccessResponse($CustomerType->toArray());

        return response()->json($response);
    }

    public function destroy(DestroyCustomerTypeRequest $destroyCustomerTypeRequest){
        $CustomerTypeDTO = CustomerTypeDTO::fromRequest($destroyCustomerTypeRequest->json()->all());

        $CustomerType = DeleteCustomerTypeAction::execute($CustomerTypeDTO);

        $response =Helpers::createSuccessResponse($CustomerType);

        return response()->json($response);
    }

}
