<?php


namespace App\Http\ViewModels\General\ProjectFiles;


use App\Domain\General\ProjectFiles\Model\ProjectFile;
use Illuminate\Contracts\Support\Arrayable;

class ShowProjectFileVM implements Arrayable
{

    private $project_file ;

    public function __construct($project_fileId)
    {
        $this->project_file = ProjectFile::find($project_fileId);
    }

    public function toArray()
    {
        return [
            'project file' => $this->project_file
        ];
    }

}
