<?php


namespace App\Http\Controllers\Customers\CustomerStatuses;


use App\Helpers\Helpers;
use App\Domain\Customers\CustomerStatuss\Actions\CreateCustomerStatusAction;
use App\Domain\Customers\CustomerStatuss\Actions\DeleteCustomerStatusAction;
use App\Domain\Customers\CustomerStatuss\Actions\UpdateCustomerStatusAction;
use App\Domain\Customers\CustomerStatuss\DTO\CustomerStatusDTO;
use App\Http\Requests\Customers\CustomerStatuses\CreateCustomerStatusRequest;
use App\Http\Requests\Customers\CustomerStatuses\UpdateCustomerStatusRequest;
use App\Http\Requests\Customers\CustomerStatuses\DestroyCustomerStatusRequest;
use App\Http\Requests\Customers\CustomerStatuses\ShowCustomerStatusRequest;
use App\Http\Requests\Customers\CustomerStatuses\EditCustomerStatusRequest;
use App\Http\ViewModels\Customers\CustomerStatuss\ShowCustomerStatusVM;
use App\Http\ViewModels\Customers\CustomerStatuss\ShowAllCustomerStatussVM;

class CustomerStatusesController
{

    public function index(){
        $CustomerStatuss = new ShowAllCustomerStatussVM();
        $response = Helpers::createSuccessResponse($CustomerStatuss->toArray());

        return response()->json($response);
    }

    public function show(ShowCustomerStatusRequest $showCustomerStatusRequest){
        $CustomerStatusDTO = CustomerStatusDTO::fromRequest($showCustomerStatusRequest->json()->all());
        $CustomerStatus = new ShowCustomerStatusVM($CustomerStatusDTO->id);
        $response = Helpers::createSuccessResponse($CustomerStatus->toArray());

        return response()->json($response);
    }

    public function edit(EditCustomerStatusRequest $editCustomerStatusRequest){
        $CustomerStatusDTO = CustomerStatusDTO::fromRequest($editCustomerStatusRequest->json()->all());
        $CustomerStatus = new ShowCustomerStatusVM($CustomerStatusDTO->id);
        $response = Helpers::createSuccessResponse($CustomerStatus->toArray());

        return response()->json($response);
    }

    public function create(CreateCustomerStatusRequest $createCustomerStatusRequest){

        $CustomerStatusDTO = CustomerStatusDTO::fromRequest($createCustomerStatusRequest->json()->all());

        $CustomerStatus = CreateCustomerStatusAction::execute($CustomerStatusDTO);

        $CustomerStatus = new ShowCustomerStatusVM($CustomerStatus->id);

        $response = Helpers::createSuccessResponse($CustomerStatus->toArray());

        return response()->json($response);
    }

    public function update(UpdateCustomerStatusRequest $updateCustomerStatusRequest){
        $CustomerStatusDTO = CustomerStatusDTO::fromRequest($updateCustomerStatusRequest->json()->all());

        $CustomerStatus = UpdateCustomerStatusAction::execute($CustomerStatusDTO);

        $CustomerStatus = new ShowCustomerStatusVM($CustomerStatus->id);

        $response = Helpers::createSuccessResponse($CustomerStatus->toArray());

        return response()->json($response);
    }

    public function destroy(DestroyCustomerStatusRequest $destroyCustomerStatusRequest){
        $CustomerStatusDTO = CustomerStatusDTO::fromRequest($destroyCustomerStatusRequest->json()->all());

        $CustomerStatus = DeleteCustomerStatusAction::execute($CustomerStatusDTO);

        $response =Helpers::createSuccessResponse($CustomerStatus);

        return response()->json($response);
    }

}
