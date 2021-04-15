<?php

namespace App\Http\Controllers\Orders;

use App\Domain\Orders\OrderStatuses\Actions\CreateOrderStatusAction;
use App\Domain\Orders\OrderStatusTranslations\Actions\CreateOrderStatusTranslationAction;
use App\Domain\Orders\OrderStatuses\Actions\DeleteOrderStatusAction;
use App\Domain\Orders\OrderStatuses\Actions\UpdateOrderStatusAction;
use App\Domain\Orders\OrderStatusTranslations\Actions\UpdateOrderStatusTranslationAction;
use App\Domain\Orders\OrderStatuses\DTO\OrderStatusDTO;
use App\Domain\Orders\OrderStatuses\Model\OrderStatus;
use App\Domain\Orders\OrderStatusTranslations\DTO\OrderStatusTranslationDTO;
use App\Domain\Orders\OrderStatusTranslations\Model\OrderStatusTranslation;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderStatuses\CreateOrderStatusRequest;
use App\Http\Requests\Orders\OrderStatuses\UpdateOrderStatusRequest;
use App\Http\ViewModels\Orders\OrderStatusesIndexVM;
use App\Http\ViewModels\Orders\ShowOrderStatusVM;
use Illuminate\Http\Request;

class OrderStatusesController extends Controller

{
    public function create(CreateOrderStatusRequest $createOrderStatusRequest){
        $orderStatusDTO = OrderStatusDTO::fromRequest($createOrderStatusRequest->json()->all());
        $orderStatus = CreateOrderStatusAction::execute($orderStatusDTO);

        foreach ($createOrderStatusRequest->json('names') as $name) {
            $name['order_status_id'] = $orderStatus->id;
            $orderStatusTranslationDTO = OrderStatusTranslationDTO::fromRequest($name);
            $orderStatusTranslation = CreateOrderStatusTranslationAction::execute($orderStatusTranslationDTO);
        }
        $orderStatus = new ShowOrderStatusVM($orderStatus);

        $response = Helpers::createSuccessResponse($orderStatus->toArray());
        return response()->json($response);
    }
    public function destroy($id){
        $order=OrderStatus::find($id);
        if($order!=null)
        {$result = DeleteOrderStatusAction::execute($order);
        $response = Helpers::createSuccessResponse($result);
        return response()->json($response);}
        else
        {$response = Helpers::createErrorResponse("no such record");
        return response()->json($response);}
    }
    public function index(){
        $orderStatus = new OrderStatusesIndexVM();
        $response  = Helpers::createSuccessResponse($orderStatus->toArray());
        return response()->json($response,200);
    }
    public function edit($id){

        $orderStatus=OrderStatus::find($id);
        if($orderStatus!=null)
        {$orderStatus = new ShowOrderStatusVM($orderStatus);
        $response = Helpers::createSuccessResponse($orderStatus->toArray());
        return response()->json($response,200);}
        $response = Helpers::createSuccessResponse('No such record');
        return response()->json($response,200);
    }
    public function update(UpdateOrderStatusRequest $updateOrderStatusRequest,$id){
        $orderStatusDTO = OrderStatusDTO::fromRequest($updateOrderStatusRequest->json()->all());
        $orderStatus = UpdateOrderStatusAction::execute($orderStatusDTO,OrderStatus::find($id));

        foreach ($updateOrderStatusRequest->json('names') as $name) {
            $name['order_status_id'] = $orderStatus->id;
            $orderStatusTranslationDTO = OrderStatusTranslationDTO::fromRequest($name);
            $orderStatusTranslation = UpdateOrderStatusTranslationAction::execute($orderStatusTranslationDTO,OrderStatusTranslation::find($name['id']));
        }
        $orderStatus = new ShowOrderStatusVM($orderStatus);

        $response = Helpers::createSuccessResponse($orderStatus->toArray());
        return response()->json($response);
    }
}

