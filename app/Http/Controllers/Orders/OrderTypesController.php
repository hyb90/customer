<?php

namespace App\Http\Controllers\Orders;

use App\Domain\Orders\OrderTypes\Actions\CreateOrderTypeAction;
use App\Domain\Orders\OrderTypeTranslations\Actions\CreateOrderTypeTranslationAction;
use App\Domain\Orders\OrderTypes\Actions\DeleteOrderTypeAction;
use App\Domain\Orders\OrderTypes\Actions\UpdateOrderTypeAction;
use App\Domain\Orders\OrderTypeTranslations\Actions\UpdateOrderTypeTranslationAction;
use App\Domain\Orders\OrderTypes\DTO\OrderTypeDTO;
use App\Domain\Orders\OrderTypes\Model\OrderType;
use App\Domain\Orders\OrderTypeTranslations\DTO\OrderTypeTranslationDTO;
use App\Domain\Orders\OrderTypeTranslations\Model\OrderTypeTranslation;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderTypes\CreateOrderTypeRequest;
use App\Http\Requests\Orders\OrderTypes\EditOrderTypeRequest;
use App\Http\Requests\Orders\OrderTypes\UpdateOrderTypeRequest;
use App\Http\ViewModels\Orders\OrderTypesIndexVM;
use App\Http\ViewModels\Orders\ShowOrderTypeVM;
use Illuminate\Http\Request;

class OrderTypesController extends Controller

{
    public function create(CreateOrderTypeRequest $createOrderTypeRequest){
        $orderTypeDTO = OrderTypeDTO::fromRequest($createOrderTypeRequest->json()->all());
        $orderType = CreateOrderTypeAction::execute($orderTypeDTO);

        foreach ($createOrderTypeRequest->json('names') as $name) {
            $name['order_type_id'] = $orderType->id;
            $orderTypeTranslationDTO = OrderTypeTranslationDTO::fromRequest($name);
            $orderTypeTranslation = CreateOrderTypeTranslationAction::execute($orderTypeTranslationDTO);
        }
        $orderType = new ShowOrderTypeVM($orderType);

        $response = Helpers::createSuccessResponse($orderType->toArray());
        return response()->json($response);
    }
    public function destroy($id){
        $order=OrderType::find($id);
        if($order!=null)
        {$result = DeleteOrderTypeAction::execute($order);
        $response = Helpers::createSuccessResponse($result);
        return response()->json($response);}
        else
        {$response = Helpers::createErrorResponse("no such record");
        return response()->json($response);}
    }
    public function index(){
        $orderType = new OrderTypesIndexVM();
        $response  = Helpers::createSuccessResponse($orderType->toArray());
        return response()->json($response,200);
    }
    public function edit($id){

        $orderType=OrderType::find($id);
        if($orderType!=null)
        {$orderType = new ShowOrderTypeVM($orderType);
        $response = Helpers::createSuccessResponse($orderType->toArray());
        return response()->json($response,200);}
        $response = Helpers::createSuccessResponse('No such record');
        return response()->json($response,200);
    }
    public function update(UpdateOrderTypeRequest $updateOrderTypeRequest,$id){
        $orderTypeDTO = OrderTypeDTO::fromRequest($updateOrderTypeRequest->json()->all());
        $orderType=OrderType::find($id);
        if($orderType!=null)
        {$orderType = UpdateOrderTypeAction::execute($orderTypeDTO,$orderType);
        foreach ($updateOrderTypeRequest->json('names') as $name) {
            $name['order_type_id'] = $orderType->id;
            $orderTypeTranslationDTO = OrderTypeTranslationDTO::fromRequest($name);
            $orderTypeTranslation = UpdateOrderTypeTranslationAction::execute($orderTypeTranslationDTO,OrderTypeTranslation::find($name['id']));
        }
        $orderType = new ShowOrderTypeVM($orderType);
        $response = Helpers::createSuccessResponse($orderType->toArray());
        return response()->json($response);}
        $response = Helpers::createSuccessResponse('No such record');
        return response()->json($response,200);
    }
}

