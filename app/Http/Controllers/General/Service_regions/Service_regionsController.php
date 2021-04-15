<?php


namespace App\Http\Controllers\General\Service_regions;


use App\Helpers\Helpers;
use App\Domain\General\Service_regions\Actions\CreateService_regionAction;
use App\Domain\General\Service_regions\Actions\DeleteService_regionAction;
use App\Domain\General\Service_regions\DTO\Service_regionDTO;
use App\Http\Requests\General\Service_regions\CreateService_regionRequest;
use App\Http\Requests\General\Service_regions\DestroyService_regionRequest;
use App\Http\ViewModels\General\Service_regions\ShowService_regionVM;

class Service_regionsController
{

    public function create(CreateService_regionRequest $createService_regionRequest){
        $Service_regionDTO = Service_regionDTO::fromRequest($createService_regionRequest->json()->all());

        $Service_region = CreateService_regionAction::execute($Service_regionDTO);

        $Service_region = new ShowService_regionVM($Service_region->id);

        $response = Helpers::createSuccessResponse($Service_region);

        return response()->json($response);
    }

    public function destroy(DestroyService_regionRequest $destroyService_regionRequest){
        $Service_regionDTO = Service_regionDTO::fromRequest($destroyService_regionRequest->json()->all());

        $Service_region = DeleteService_regionAction::execute($Service_regionDTO->id);

        $response =Helpers::createSuccessResponse($Service_region);

        return response()->json($response);
    }

}
