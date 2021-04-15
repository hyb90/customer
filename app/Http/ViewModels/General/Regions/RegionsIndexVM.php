<?php


namespace App\Http\ViewModels\General\Regions;


use App\Domain\General\Regions\Region\Model\Region;
use Illuminate\Contracts\Support\Arrayable;

class RegionsIndexVM implements Arrayable
{

    private $regions ;
    public function __construct()
    {
        $this->regions = array();
        $regions = Region::all();
        foreach ($regions as $region){
            $region = new ShowRegionVM($region);
            array_push($this->regions,$region->toArray());
        }
    }

    public function toArray()
    {
        return [
          'regions' => $this->regions
        ];
    }
}
