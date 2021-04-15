<?php


namespace App\Http\ViewModels\General\Regions;


use App\Domain\General\Regions\Region\Model\Region;
use App\Domain\General\Regions\RegionType\Model\RegionType;
use App\Domain\General\Regions\RegionTypeTranslation\Model\RegionTypeTranslation;
use Illuminate\Contracts\Support\Arrayable;

class ShowRegionTypeVM implements Arrayable
{
    private $regionType;
    public function __construct(RegionType $regionType)
    {
        $this->regionType = $regionType;
        $this->regionType->setAttribute('names',$this->get_names($regionType->id));

    }

    public function get_names($region_type_id){

        $region_type_names = RegionTypeTranslation::where('region_type_id',$region_type_id)->get();
        return $region_type_names ;
    }
    public function toArray()
    {
        return [
            'region type' => $this->regionType
        ] ;
    }
}
