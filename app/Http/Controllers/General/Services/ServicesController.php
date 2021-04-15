<?php


namespace App\Http\Controllers\General\Services;


use App\Domain\General\ServiceTranslations\Actions\CreateServiceTranslationAction;
use App\Domain\General\ServiceTranslations\Actions\UpdateServiceTranslationAction;
use App\Domain\General\ServiceTranslations\DTO\ServiceTranslationDTO;
use App\Helpers\Helpers;
use App\Domain\General\Services\Actions\CreateServiceAction;
use App\Domain\General\Services\Actions\DeleteServiceAction;
use App\Domain\General\Services\Actions\UpdateServiceAction;
use App\Domain\General\Services\DTO\ServiceDTO;
use App\Domain\General\Services\Model\Service;
use App\Http\Requests\General\Services\CreateServiceRequest;
use App\Http\Requests\General\Services\UpdateServiceRequest;
use App\Http\Requests\General\Services\DestroyServiceRequest;
use App\Http\Requests\General\Services\ShowServiceRequest;
use App\Http\Requests\General\Services\EditServiceRequest;
use App\Http\ViewModels\General\Services\ShowServiceVM;
use App\Http\ViewModels\General\Services\ShowAllServicesVM;

class ServicesController
{

    public function index(){
        $Services = new ShowAllServicesVM();
        $response = Helpers::createSuccessResponse($Services->toArray());

        return response()->json($response);
    }

    public function show(ShowServiceRequest $showServiceRequest){
        $ServiceDTO = ServiceDTO::fromRequest($showServiceRequest->json()->all());
        $Service = new ShowServiceVM($ServiceDTO->id);
        $response = Helpers::createSuccessResponse($Service->toArray());

        return response()->json($response);
    }

    public function edit(EditServiceRequest $editServiceRequest){
        $ServiceDTO = ServiceDTO::fromRequest($editServiceRequest->json()->all());
        $Service = new ShowServiceVM($ServiceDTO->id);
        $response = Helpers::createSuccessResponse($Service->toArray());

        return response()->json($response);
    }

    public function create(CreateServiceRequest $createServiceRequest){
        $ServiceDTO = ServiceDTO::fromRequest($createServiceRequest->json()->all());
        $Service = CreateServiceAction::execute($ServiceDTO);

        foreach($createServiceRequest->json('names') as $name){
            $name['service_id'] = $Service->id;
            $name['created_by_user_id'] = $createServiceRequest->json('created_by_user_id');
            $serviceTranslationDTO = ServiceTranslationDTO::fromRequest($name);
            CreateServiceTranslationAction::execute($serviceTranslationDTO);
        }

        $Service = new ShowServiceVM($Service->id);

        $response = Helpers::createSuccessResponse($Service->toArray());

        return response()->json($response);
    }

    public function update(UpdateServiceRequest $updateServiceRequest){
        $ServiceDTO = ServiceDTO::fromRequest($updateServiceRequest->json()->all());

        $Service = UpdateServiceAction::execute($ServiceDTO);

        foreach($updateServiceRequest->json('names') as $name){
            $name['service_id'] = $Service->id;
            $name['updated_by_user_id'] = $updateServiceRequest->json('updated_by_user_id');
            $serviceTranslationDTO = ServiceTranslationDTO::fromRequest($name);
            UpdateServiceTranslationAction::execute($serviceTranslationDTO);
        }
        $Service = new ShowServiceVM($Service->id);

        $response = Helpers::createSuccessResponse($Service->toArray());

        return response()->json($response);
    }

    public function destroy(DestroyServiceRequest $destroyServiceRequest){
        $ServiceDTO = ServiceDTO::fromRequest($destroyServiceRequest->json()->all());

        $Service = DeleteServiceAction::execute($ServiceDTO);

        $response =Helpers::createSuccessResponse($Service);

        return response()->json($response);
    }

}
