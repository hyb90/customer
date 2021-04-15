<?php


namespace App\Domain\General\ProjectFiles\Actions;


use App\Domain\General\ProjectFiles\DTO\ProjectFileDTO;
use App\Domain\General\ProjectFiles\Model\ProjectFile;
use Illuminate\Support\Facades\Auth;

class UpdateProjectFileAction
{

    public static function execute(
        ProjectFileDTO $projectFileDTO
    ){
        $projectFile = ProjectFile::find($projectFileDTO->id);
        $projectFile->update($projectFileDTO->toArray());
        $projectFile->updated_by_user_id = Auth::id();
        $projectFile->save();
        return $projectFile;
    }

}
