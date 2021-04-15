<?php


namespace App\Http\ViewModels\General\Regions;


use App\Domain\General\Regions\Region\Model\Region;
use App\Domain\General\Regions\RegionLatlong\Model\RegionLatlong;
use App\Domain\General\Regions\RegionTranslation\Model\RegionTranslation;
use Illuminate\Contracts\Support\Arrayable;

class ShowRegionVM implements Arrayable
{
    private $region;
    public function __construct(Region $region)
    {
        $this->region = $region;
        $this->region->setAttribute('names',$this->get_names($region->id));
        $this->region->setAttribute('region_locations',$this->get_locations($region->id));

    }

    public function get_names($region_id){

        $region_names = RegionTranslation::where('region_id',$region_id)->get();
        return $region_names ;
    }
    public function get_locations($region_id){

        $region_latlongs = RegionLatlong::where('region_id',$region_id)->get();
        return $region_latlongs ;
    }
    public function toArray()
    {
        return [
            'region' => $this->region
        ] ;
    }
}
