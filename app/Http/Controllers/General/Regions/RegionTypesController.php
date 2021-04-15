<?php

namespace App\Http\Controllers\General\Regions;

use App\Domain\General\Regions\RegionType\Actions\CreateRegionTypeAction;
use App\Domain\General\Regions\RegionType\Actions\DeleteRegionTypeAction;
use App\Domain\General\Regions\RegionType\Actions\UpdateRegionTypeAction;
use App\Domain\General\Regions\RegionType\DTO\RegionTypeDTO;
use App\Domain\General\Regions\RegionTypeTranslation\Actions\CreateRegionTypeTranslationAction;
use App\Domain\General\Regions\RegionTypeTranslation\Actions\UpdateRegionTypeTranslationAction;
use App\Domain\General\Regions\RegionTypeTranslation\DTO\RegionTypeTranslationDTO;
use App\Domain\General\Regions\RegionTypeTranslation\Model\RegionTypeTranslation;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\General\Regions\RegionTypes\CreateRegionTypeRequest;
use App\Domain\General\Regions\RegionType\Model\RegionType;
use App\Http\Requests\General\Regions\RegionTypes\EditRegionTypeRequest;
use App\Http\Requests\General\Regions\RegionTypes\UpdateRegionTypeRequest;
use App\Http\ViewModels\General\Regions\RegionTypesIndexVM;
use App\Http\ViewModels\General\Regions\ShowRegionTypeVM;
use App\Http\ViewModels\General\Regions\ShowRegionVM;
use Illuminate\Http\Request;

class RegionTypesController extends Controller
{
    public function create(CreateRegionTypeRequest $createRegionRequest){
        $regionTypeDTO = RegionTypeDTO::fromRequest($createRegionRequest->json()->all());
        $regionType = CreateRegionTypeAction::execute($regionTypeDTO);

        foreach ($createRegionRequest->json('names') as $name) {
            $name['region_type_id'] = $regionType->id;
            $regionTypeTranslationDTO = RegionTypeTranslationDTO::fromRequest($name);
            $regionTypeTranslation = CreateRegionTypeTranslationAction::execute($regionTypeTranslationDTO);
        }
        $regionType = new ShowRegionTypeVM($regionType);

        $response = Helpers::createSuccessResponse($regionType->toArray());
        return response()->json($response);
    }
    public function destroy(RegionType $regionType){

        $region = DeleteRegionTypeAction::execute($regionType);

        $response = Helpers::createSuccessResponse($regionType);
        return response()->json($response);
    }
    public function index(){
        $regionTypes = new RegionTypesIndexVM();
        $response  = Helpers::createSuccessResponse($regionTypes->toArray());
        return response()->json($response,200);
    }
    public function edit(EditRegionTypeRequest $editRegionTypeRequest){
        $regionType = new ShowRegionTypeVM(RegionType::find($editRegionTypeRequest->json("id")));
        $response = Helpers::createSuccessResponse($regionType->toArray());
        return response()->json($response,200);
    }
    public function update(UpdateRegionTypeRequest $updateRegionTypeRequest){
        $regionTypeDTO = RegionTypeDTO::fromRequest($updateRegionTypeRequest->json()->all());
        $regionType = UpdateRegionTypeAction::execute(RegionType::find($updateRegionTypeRequest->json('id')),$regionTypeDTO);

        foreach ($updateRegionTypeRequest->json('names') as $name) {
            $name['region_type_id'] = $regionType->id;
            $regionTypeTranslationDTO = RegionTypeTranslationDTO::fromRequest($name);
            $regionTypeTranslation = UpdateRegionTypeTranslationAction::execute(RegionTypeTranslation::find($name['id']),$regionTypeTranslationDTO);
        }
        $regionType = new ShowRegionTypeVM($regionType);

        $response = Helpers::createSuccessResponse($regionType->toArray());
        return response()->json($response);
    }
}
