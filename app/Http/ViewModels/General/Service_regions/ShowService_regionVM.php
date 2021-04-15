<?php


namespace App\Http\ViewModels\General\Service_regions;

use App\Domain\General\Service_regions\Model\Service_region;
use Illuminate\Contracts\Support\Arrayable;


class ShowService_regionVM implements Arrayable
{

    private $Service_region;

    public function __construct($Service_regionId)
    {
        $this->Service_region = Service_region::find($Service_regionId) ;
    }
    public function toArray()
    {
        return [
            'Service_region' => $this->Service_region
        ];
    }
}
