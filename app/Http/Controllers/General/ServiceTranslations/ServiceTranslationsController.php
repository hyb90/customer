<?php


namespace App\Http\Controllers\General\ServiceTranslations;


use App\Helpers\Helpers;
use App\Domain\General\ServiceTranslations\Actions\CreateServiceTranslationAction;
use App\Domain\General\ServiceTranslations\Actions\DeleteServiceTranslationAction;
use App\Domain\General\ServiceTranslations\Actions\UpdateServiceTranslationAction;
use App\Domain\General\ServiceTranslations\DTO\ServiceTranslationDTO;
use App\Domain\General\ServiceTranslations\Model\ServiceTranslation;
use App\Http\Requests\ServiceTranslations\CreateServiceTranslationRequest;
use App\Http\Requests\ServiceTranslations\UpdateServiceTranslationRequest;
use App\Http\Requests\ServiceTranslations\DestroyServiceTranslationRequest;
use App\Http\Requests\ServiceTranslations\ShowServiceTranslationRequest;
use App\Http\Requests\ServiceTranslations\EditServiceTranslationRequest;
use App\Http\ViewModels\General\ServiceTranslations\ShowServiceTranslationVM;
use App\Http\ViewModels\General\ServiceTranslations\ShowAllServiceTranslationsVM;

class ServiceTranslationsController
{

    public function show(ShowServiceTranslationRequest $showServiceTranslationRequest){
        $ServiceTranslationDTO = ServiceTranslationDTO::fromRequest($showServiceTranslationRequest->json()->all());
        $ServiceTranslation = new ShowServiceTranslationVM($ServiceTranslationDTO->id);
        $response = Helpers::createSuccessResponse($ServiceTranslation->toArray());

        return response()->json($response);
    }

    public function edit(EditServiceTranslationRequest $editServiceTranslationRequest){
        $ServiceTranslationDTO = ServiceTranslationDTO::fromRequest($editServiceTranslationRequest->json()->all());
        $ServiceTranslation = new ShowServiceTranslationVM($ServiceTranslationDTO->id);
        $response = Helpers::createSuccessResponse($ServiceTranslation->toArray());

        return response()->json($response);
    }

    public function create(CreateServiceTranslationRequest $createServiceTranslationRequest){
        $ServiceTranslationDTO = ServiceTranslationDTO::fromRequest($createServiceTranslationRequest->json()->all());

        $ServiceTranslation = CreateServiceTranslationAction::execute($ServiceTranslationDTO);

        $ServiceTranslation = new ShowServiceTranslationVM($ServiceTranslation->id);

        $response = Helpers::createSuccessResponse($ServiceTranslation);

        return response()->json($response);
    }

    public function update(UpdateServiceTranslationRequest $updateServiceTranslationRequest){
        $ServiceTranslationDTO = ServiceTranslationDTO::fromRequest($updateServiceTranslationRequest->json()->all());

        $ServiceTranslation = UpdateServiceTranslationAction::execute($ServiceTranslationDTO);

        $ServiceTranslation = new ShowServiceTranslationVM($ServiceTranslation->id);

        $response = Helpers::createSuccessResponse($ServiceTranslation);

        return response()->json($response);
    }

    public function destroy(DestroyServiceTranslationRequest $destroyServiceTranslationRequest){
        $ServiceTranslationDTO = ServiceTranslationDTO::fromRequest($destroyServiceTranslationRequest->json()->all());

        $ServiceTranslation = DeleteServiceTranslationAction::execute($ServiceTranslationDTO->id);

        $response =Helpers::createSuccessResponse($ServiceTranslation);

        return response()->json($response);
    }

}
