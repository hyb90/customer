<?php


namespace App\Domain\General\ProjectFiles\Actions;


use App\Domain\General\ProjectFiles\Model\ProjectFile;
use Illuminate\Support\Facades\Auth;

class DeleteProjectFileAction
{

    public static function execute(
        $projectFileId
    ){
        $projectFile = ProjectFile::find($projectFileId);
        $projectFile->deleted_by_user_id = Auth::id();
        $projectFile->save();
        $projectFile->delete();
        return 'deleted successfully.';
    }
}
