<?php

namespace App\Http\Controllers\Orders;

use App\Domain\Orders\OrderFiles\Actions\CreateOrderFileAction;
use App\Domain\Orders\OrderFiles\Actions\DeleteOrderFileAction;
use App\Domain\Orders\OrderFiles\Actions\UpdateOrderFileAction;
use App\Domain\Orders\OrderFiles\DTO\OrderFileDTO;
use App\Domain\Orders\OrderFiles\Model\OrderFile;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderFiles\CreateOrderFileRequest;
use App\Http\Requests\Orders\OrderFiles\EditOrderFileRequest;
use App\Http\Requests\Orders\OrderFiles\UpdateOrderFileRequest;

use App\Http\ViewModels\Orders\OrderFilesIndexVM;
use App\Http\ViewModels\Orders\ShowOrderFileVM;
use Illuminate\Http\Request;

class OrderFilesController extends Controller
{
    public function create(CreateOrderFileRequest $createContractFileRequest){

        $orderFileDTO = OrderFileDTO::fromRequest($createContractFileRequest->json()->all());
        $orderFile = CreateOrderFileAction::execute($orderFileDTO);

        $orderFile= new ShowOrderFileVM($orderFile);

        $response = Helpers::createSuccessResponse($orderFile->toArray());
        return response()->json($response);
    }
    public function index(){
        $orders = new OrderFilesIndexVM();
        $response  = Helpers::createSuccessResponse($orders->toArray());
        return response()->json($response,200);
    }
    public function update(UpdateOrderFileRequest $updateContractFileRequest,$id){
        $orderFileDTO = OrderFileDTO::fromRequest($updateContractFileRequest->json()->all());
        $orderFile=OrderFile::find($id);
        if($orderFile!=null)
        {$orderFile = UpdateOrderFileAction::execute($orderFile,$orderFileDTO);
        $response = Helpers::createSuccessResponse($orderFile->toArray());
        return response()->json($response);}
        $response = Helpers::createSuccessResponse('No such record');
        return response()->json($response,200);
    }
    public function edit($id){

        $orderFile=OrderFile::find($id);
        if($orderFile!=null)
        {$orderFile = new ShowOrderFileVM($orderFile);
            $response = Helpers::createSuccessResponse($orderFile->toArray());
            return response()->json($response,200);}
        $response = Helpers::createSuccessResponse('No such record');
        return response()->json($response,200);
    }
    public function destroy($id){
        $orderFile=OrderFile::find($id);
        if($orderFile!=null)
        {$orderFile = DeleteOrderFileAction::execute($orderFile);
            $response = Helpers::createSuccessResponse($orderFile);
            return response()->json($response);}
        else
        {$response = Helpers::createErrorResponse("no such record");
            return response()->json($response);}
    }
}
