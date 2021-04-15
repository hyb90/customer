<?php


namespace App\Http\Controllers\Customers\CustomerLabels;


use App\Helpers\Helpers;
use App\Domain\Customers\CustomerLabels\Actions\CreateCustomerLabelAction;
use App\Domain\Customers\CustomerLabels\Actions\DeleteCustomerLabelAction;
use App\Domain\Customers\CustomerLabels\Actions\UpdateCustomerLabelAction;
use App\Domain\Customers\CustomerLabels\DTO\CustomerLabelDTO;
use App\Http\Requests\Customers\CustomerLabels\CreateCustomerLabelRequest;
use App\Http\Requests\Customers\CustomerLabels\UpdateCustomerLabelRequest;
use App\Http\Requests\Customers\CustomerLabels\DestroyCustomerLabelRequest;
use App\Http\Requests\Customers\CustomerLabels\ShowCustomerLabelRequest;
use App\Http\Requests\Customers\CustomerLabels\EditCustomerLabelRequest;
use App\Http\ViewModels\Customers\CustomerLabels\ShowCustomerLabelVM;
use App\Http\ViewModels\Customers\CustomerLabels\ShowAllCustomerLabelsVM;

class CustomerLabelsController
{

    public function index(){
        $CustomerLabels = new ShowAllCustomerLabelsVM();
        $response = Helpers::createSuccessResponse($CustomerLabels->toArray());

        return response()->json($response);
    }

    public function show(ShowCustomerLabelRequest $showCustomerLabelRequest){
        $CustomerLabelDTO = CustomerLabelDTO::fromRequest($showCustomerLabelRequest->json()->all());
        $CustomerLabel = new ShowCustomerLabelVM($CustomerLabelDTO->id);
        $response = Helpers::createSuccessResponse($CustomerLabel->toArray());

        return response()->json($response);
    }

    public function edit(EditCustomerLabelRequest $editCustomerLabelRequest){
        $CustomerLabelDTO = CustomerLabelDTO::fromRequest($editCustomerLabelRequest->json()->all());
        $CustomerLabel = new ShowCustomerLabelVM($CustomerLabelDTO->id);
        $response = Helpers::createSuccessResponse($CustomerLabel->toArray());

        return response()->json($response);
    }

    public function create(CreateCustomerLabelRequest $createCustomerLabelRequest){
        $CustomerLabelDTO = CustomerLabelDTO::fromRequest($createCustomerLabelRequest->json()->all());

        $CustomerLabel = CreateCustomerLabelAction::execute($CustomerLabelDTO);

        $CustomerLabel = new ShowCustomerLabelVM($CustomerLabel->id);

        $response = Helpers::createSuccessResponse($CustomerLabel->toArray());

        return response()->json($response);
    }

    public function update(UpdateCustomerLabelRequest $updateCustomerLabelRequest){
        $CustomerLabelDTO = CustomerLabelDTO::fromRequest($updateCustomerLabelRequest->json()->all());

        $CustomerLabel = UpdateCustomerLabelAction::execute($CustomerLabelDTO);

        $CustomerLabel = new ShowCustomerLabelVM($CustomerLabel->id);

        $response = Helpers::createSuccessResponse($CustomerLabel->toArray());

        return response()->json($response);
    }

    public function destroy(DestroyCustomerLabelRequest $destroyCustomerLabelRequest){
        $CustomerLabelDTO = CustomerLabelDTO::fromRequest($destroyCustomerLabelRequest->json()->all());

        $CustomerLabel = DeleteCustomerLabelAction::execute($CustomerLabelDTO);

        $response =Helpers::createSuccessResponse($CustomerLabel);

        return response()->json($response);
    }

}
