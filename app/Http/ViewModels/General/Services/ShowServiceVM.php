<?php


namespace App\Http\ViewModels\General\Services;

use App\Domain\General\Services\Model\Service;
use App\Domain\General\ServiceTranslations\Model\ServiceTranslation;
use Illuminate\Contracts\Support\Arrayable;


class ShowServiceVM implements Arrayable
{

    private $Service;

    public function __construct($ServiceId)
    {
        $this->Service = Service::find($ServiceId) ;
        $this->Service->setAttribute('names',ServiceTranslation::where('service_id',$ServiceId)->get());
    }
    public function toArray()
    {
        return [
            'Service' => $this->Service
        ];
    }
}
