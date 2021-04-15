<?php


namespace App\Http\ViewModels\General\ProjectFiles;


use App\Domain\General\ProjectFiles\Model\ProjectFile;
use Illuminate\Contracts\Support\Arrayable;

class ProjectFileIndexVM implements Arrayable
{
    private $project_files ;

    public function __construct()
    {
        $this->project_files = ProjectFile::all();
    }

    public function toArray()
    {
        return [
            'project files' => $this->project_files
        ];
    }
}
