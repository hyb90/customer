<?php

namespace App\Http\Controllers\Orders;

use App\Domain\Orders\OrderActivities\Actions\CreateOrderActivityAction;
use App\Domain\Orders\OrderActivities\DTO\OrderActivityDTO;
use App\Domain\Orders\Orders\Actions\CreateOrderAction;
use App\Domain\Orders\Orders\Actions\UpdateOrderAction;
use App\Domain\Orders\Orders\Actions\DeleteOrderAction;
use App\Domain\Orders\Orders\DTO\OrderDTO;
use App\Domain\Orders\Orders\Model\Order;
use App\Domain\Orders\OrderStatusLogs\Actions\CreateOrderStatusLogAction;
use App\Domain\Orders\OrderStatusLogs\DTO\OrderStatusLogDTO;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\Orders\CreateOrderRequest;
use App\Http\Requests\Orders\Orders\EditOrderRequest;
use App\Http\Requests\Orders\Orders\UpdateOrderRequest;
use App\Http\ViewModels\Orders\OrdersIndexVM;
use App\Http\ViewModels\Orders\ShowOrderVM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function create(CreateOrderRequest $createOrderRequest){

        $orderDTO = OrderDTO::fromRequest($createOrderRequest->json()->all());
        $order = CreateOrderAction::execute($orderDTO);
        $activityR['order_id']=$order->id;
        $activityR['order_status_id']=$order->order_status_id;
        $activityDTO = OrderStatusLogDTO::fromRequest($activityR);
        $activity=CreateOrderStatusLogAction::execute($activityDTO);
        $order = new ShowOrderVM($order);
        $response = Helpers::createSuccessResponse($order->toArray());
        return response()->json($response);
    }
    public function index(Request $request){
        $orders = new OrdersIndexVM($request);
        $response  = Helpers::createSuccessResponse($orders->toArray());
        return response()->json($response,200);
    }
    public function update(UpdateOrderRequest $updateOrderRequest,$id){
        $orderDTO = OrderDTO::fromRequest($updateOrderRequest->json()->all());
        $order=Order::find($id);
        if($order!=null)
        {
            $order = UpdateOrderAction::execute($order,$orderDTO);
            $activityR['order_id']=$order->id;
            $activityR['order_status_id']=$order->order_status_id;
            $activityDTO = OrderStatusLogDTO::fromRequest($activityR);
            $activity=CreateOrderStatusLogAction::execute($activityDTO);
            $order = new ShowOrderVM($order);
            $response = Helpers::createSuccessResponse($order->toArray());
            return response()->json($response);}
        else
        {$response = Helpers::createErrorResponse("no such record");
            return response()->json($response);}
    }
    public function edit($id){

        $order=Order::find($id);
        if($order!=null)
        {$order = new ShowOrderVM($order);
            $response = Helpers::createSuccessResponse($order->toArray());
            return response()->json($response,200);}
        $response = Helpers::createSuccessResponse('No such record');
        return response()->json($response,200);
    }
    public function destroy($id){
        $order=Order::find($id);
        if($order!=null)
        {   $order = DeleteOrderAction::execute($order);
            $response = Helpers::createSuccessResponse($order);
            return response()->json($response);}
        else
        {$response = Helpers::createErrorResponse("no such record");
            return response()->json($response);}
    }
    public function bulk_destroy(Request $request)
    {
        $response = [];
        foreach($request->ids as $id)
        {
            $response = $this->destroy($id);
        }

        return $response;
    }
}
