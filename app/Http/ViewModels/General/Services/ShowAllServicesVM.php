<?php


namespace App\Http\ViewModels\General\Services;

use App\Domain\General\Services\Model\Service;
use Illuminate\Contracts\Support\Arrayable;

class ShowAllServicesVM implements Arrayable
{

    private $Services;

    public function __construct(){

        $this->Services = array();
        $Services = Service::all();
        foreach ($Services as $Service) {
            $one_Service = new ShowServiceVM($Service->id);
            array_push($this->Services,$one_Service->toArray());
        }
    }
    public function toArray()
    {
        return [
            'Services' => $this->Services
        ];
    }
}
