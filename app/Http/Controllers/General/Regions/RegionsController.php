<?php

namespace App\Http\Controllers\General\Regions;

use App\Domain\General\Regions\Region\Actions\CreateRegionAction;
use App\Domain\General\Regions\Region\Actions\DeleteRegionAction;
use App\Domain\General\Regions\Region\Actions\UpdateRegionAction;
use App\Domain\General\Regions\Region\DTO\RegionDTO;
use App\Domain\General\Regions\Region\Model\Region;
use App\Domain\General\Regions\RegionLatlong\Actions\CreateRegionLatlongAction;
use App\Domain\General\Regions\RegionLatlong\DTO\RegionLatlongDTO;
use App\Domain\General\Regions\RegionTranslation\Actions\CreateRegionTranslationAction;
use App\Domain\General\Regions\RegionTranslation\Actions\UpdateRegionTranslationAction;
use App\Domain\General\Regions\RegionTranslation\DTO\RegionTranslationDTO;
use App\Domain\General\Regions\RegionTranslation\Model\RegionTranslation;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\General\Regions\CreateRegionRequest;
use App\Http\Requests\General\Regions\EditRegionRequest;
use App\Http\Requests\General\Regions\UpdateRegionRequest;
use App\Http\ViewModels\General\Regions\RegionsIndexVM;
use App\Http\ViewModels\General\Regions\ShowRegionVM;
use Illuminate\Http\Request;

class RegionsController extends Controller
{
    public function create(CreateRegionRequest $createRegionRequest){
        $regionDTO = RegionDTO::fromRequest($createRegionRequest->json()->all());
        $region = CreateRegionAction::execute($regionDTO);

        foreach ($createRegionRequest->json('names') as $name) {
            $name['region_id'] = $region->id;
            $regionTranslationDTO = RegionTranslationDTO::fromRequest($name);
            $regionTranslation = CreateRegionTranslationAction::execute($regionTranslationDTO);
        }
        foreach ($createRegionRequest->json('region_locations') as $name) {
            $name['region_id'] = $region->id;
            $regionLatlongDTO = RegionLatlongDTO::fromRequest($name);
            $regionLatlong = CreateRegionLatlongAction::execute($regionLatlongDTO);
        }
        $region = new ShowRegionVM($region);
        $response = Helpers::createSuccessResponse($region->toArray());
        return response()->json($response);
    }
    public function index(){
        $regions = new RegionsIndexVM();
        $response = Helpers::createSuccessResponse($regions->toArray());
        return response()->json($response,200);
    }
    public function destroy(Region $region){

        $region = DeleteRegionAction::execute($region);

        $response = Helpers::createSuccessResponse($region);
        return "deleted successfully.";
    }

    public function update(UpdateRegionRequest $updateRegionRequest){
        $regionDTO = RegionDTO::fromRequest($updateRegionRequest->json()->all());
        $region = UpdateRegionAction::execute(Region::find($updateRegionRequest->json('id')),$regionDTO);

        foreach ($updateRegionRequest->json('names') as $name) {
            $regionTranslationDTO = RegionTranslationDTO::fromRequest($name);
            $regionTranslation = UpdateRegionTranslationAction::execute(RegionTranslation::find($name['id']),$regionTranslationDTO);
        }
        $region = new ShowRegionVM($region);
        $response = Helpers::createSuccessResponse($region->toArray());
        return response()->json($response);
    }

    public function edit(EditRegionRequest $editRegionRequest){
        $region = new ShowRegionVM(Region::find($editRegionRequest->json('id')));
        $response = Helpers::createSuccessResponse($region->toArray());
        return response()->json($response,200);
    }
}
