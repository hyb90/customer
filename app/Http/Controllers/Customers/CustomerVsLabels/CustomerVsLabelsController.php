<?php


namespace App\Http\Controllers\Customers\CustomerVsLabels;


use App\Helpers\Helpers;
use App\Domain\Customers\CustomerVsLabels\Actions\CreateCustomerVsLabelAction;
use App\Domain\Customers\CustomerVsLabels\Actions\DeleteCustomerVsLabelAction;
use App\Domain\Customers\CustomerVsLabels\Actions\UpdateCustomerVsLabelAction;
use App\Domain\Customers\CustomerVsLabels\DTO\CustomerVsLabelDTO;
use App\Http\Requests\Customers\CustomerVsLabels\CreateCustomerVsLabelRequest;
use App\Http\Requests\Customers\CustomerVsLabels\CustomersOfLabelRequest;
use App\Http\Requests\Customers\CustomerVsLabels\LabelsOfCustomerRequest;
use App\Http\Requests\Customers\CustomerVsLabels\UpdateCustomerVsLabelRequest;
use App\Http\Requests\Customers\CustomerVsLabels\DestroyCustomerVsLabelRequest;
use App\Http\Requests\Customers\CustomerVsLabels\ShowCustomerVsLabelRequest;
use App\Http\Requests\Customers\CustomerVsLabels\EditCustomerVsLabelRequest;
use App\Http\ViewModels\Customers\CustomerVsLabels\ShowAllCustomersOfLabelVM;
use App\Http\ViewModels\Customers\CustomerVsLabels\ShowAllLabelsOfCustomerVM;
use App\Http\ViewModels\Customers\CustomerVsLabels\ShowCustomerVsLabelVM;
use App\Http\ViewModels\Customers\CustomerVsLabels\ShowAllCustomerVsLabelsVM;

class CustomerVsLabelsController
{

    public function customers_of_label(CustomersOfLabelRequest $customerOfLabelRequest){
        $Customers = new ShowAllCustomersOfLabelVM($customerOfLabelRequest->json('customer_label_id'));
        $response = Helpers::createSuccessResponse($Customers->toArray());

        return response()->json($response);
    }
    public function labels_of_customer(LabelsOfCustomerRequest $labelsOfCustomersRequest){
        $Labels = new ShowAllLabelsOfCustomerVM($labelsOfCustomersRequest->json('customer_id'));
        $response = Helpers::createSuccessResponse($Labels->toArray());

        return response()->json($response);
    }

    public function create(CreateCustomerVsLabelRequest $createCustomerVsLabelRequest){
        $CustomerVsLabelDTO = CustomerVsLabelDTO::fromRequest($createCustomerVsLabelRequest->json()->all());

        $CustomerVsLabel = CreateCustomerVsLabelAction::execute($CustomerVsLabelDTO);

        $CustomerVsLabel = new ShowCustomerVsLabelVM($CustomerVsLabel->id);

        $response = Helpers::createSuccessResponse($CustomerVsLabel->toArray());

        return response()->json($response);
    }

    public function destroy(DestroyCustomerVsLabelRequest $destroyCustomerVsLabelRequest){
        $CustomerVsLabelDTO = CustomerVsLabelDTO::fromRequest($destroyCustomerVsLabelRequest->json()->all());

        $CustomerVsLabel = DeleteCustomerVsLabelAction::execute($CustomerVsLabelDTO);

        $response =Helpers::createSuccessResponse($CustomerVsLabel);

        return response()->json($response);
    }

}
