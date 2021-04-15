<?php


namespace App\Domain\General\ProjectFiles\Actions;


use App\Domain\General\ProjectFiles\DTO\ProjectFileDTO;
use App\Domain\General\ProjectFiles\Model\ProjectFile;
use Illuminate\Support\Facades\Auth;

class CreateProjectFileAction
{
    public static function execute(
        ProjectFileDTO $projectFileDTO
    ){
        $projectFile = new ProjectFile($projectFileDTO->toArray());
        $projectFile->created_by_user_id = Auth::id();
        $projectFile->save();
        return $projectFile;
    }
}
