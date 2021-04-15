<?php


namespace App\Http\ViewModels\General\Service_regions;

use App\Domain\General\Service_regions\Model\Service_region;
use Illuminate\Contracts\Support\Arrayable;

class ShowAllService_regionsVM implements Arrayable
{

    private $Service_regions;

    public function __construct(){

        $this->Service_regions = array();
        $Service_regions = Service_region::all();
        foreach ($Service_regions as $Service_region) {
            $one_Service_region = new ShowService_regionVM($Service_region->id);
            array_push($this->Service_regions,$one_Service_region->toArray());
        }
    }
    public function toArray()
    {
        return [
            'Service_regions' => $this->Service_regions
        ];
    }
}
