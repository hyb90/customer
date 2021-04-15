<?php


namespace App\Http\ViewModels\General\Regions;


use App\Domain\General\Regions\RegionType\Model\RegionType;
use Illuminate\Contracts\Support\Arrayable;

class RegionTypesIndexVM implements Arrayable
{
    private $region_types;

    public function __construct()
    {
        $this->region_types = array();
        $regionTypes = RegionType::all();
        foreach ($regionTypes as $region_type) {
            $region_type = new ShowRegionTypeVM($region_type);
            array_push($this->region_types,$region_type->toArray()['region type']);
        }
    }

    public function toArray()
    {
        return [
            'region_types' => $this->region_types
        ];
    }

}
