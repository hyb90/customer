<?php

namespace App\Http\Controllers\General\ProjectFiles;

use App\Domain\General\ProjectFiles\Actions\CreateProjectFileAction;
use App\Domain\General\ProjectFiles\Actions\DeleteProjectFileAction;
use App\Domain\General\ProjectFiles\Actions\UpdateProjectFileAction;
use App\Domain\General\ProjectFiles\DTO\ProjectFileDTO;
use App\Domain\General\ProjectFiles\Model\ProjectFile;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\General\ProjectFile\CreateProjectFileRequest;
use App\Http\Requests\General\ProjectFile\DestroyProjectFileRequest;
use App\Http\Requests\General\ProjectFile\ShowProjectFileRequest;
use App\Http\Requests\General\ProjectFile\UpdateProjectFileRequest;
use App\Http\ViewModels\General\ProjectFiles\ProjectFileIndexVM;
use App\Http\ViewModels\General\ProjectFiles\ShowProjectFileVM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectFileController extends Controller
{
    public function create(CreateProjectFileRequest $createRoleRequest){
        $projectFileDTO =  ProjectFileDTO::fromRequest($createRoleRequest);
        $projectFile = CreateProjectFileAction::execute($projectFileDTO);
        $response = Helpers::createSuccessResponse($projectFile);

        return response()->json($response,200);
    }

    public function index(){
        $projectFiles = new ProjectFileIndexVM();
        $response = Helpers::createSuccessResponse($projectFiles->toArray());
        return response()->json($response,200);

    }
    public function show(ShowProjectFileRequest $showProjectFileRequest){
        $projectFile = new ShowProjectFileVM($showProjectFileRequest->json('id'));
        $response = Helpers::createSuccessResponse($projectFile->toArray());
        return response()->json($response,200);
    }
    public function update(UpdateProjectFileRequest $updateProjectFileRequest){
        $projectFileDTO =  ProjectFileDTO::fromRequest($updateProjectFileRequest);
        $projectFile = UpdateProjectFileAction::execute($projectFileDTO);
        $response = Helpers::createSuccessResponse($projectFile);

        return response()->json($response,200);
    }
    public function destroy(DestroyProjectFileRequest $destroyProjectFileRequest){
        $projectFile = DeleteProjectFileAction::execute($destroyProjectFileRequest->json('id'));
        $response = Helpers::createSuccessResponse($projectFile);
        return response()->json($response,200);
    }
}
