<?php


namespace App\Http\ViewModels\General\ServiceTranslations;

use App\Domain\General\ServiceTranslations\Model\ServiceTranslation;
use Illuminate\Contracts\Support\Arrayable;

class ShowAllServiceTranslationsVM implements Arrayable
{

    private $ServiceTranslations;

    public function __construct(){

        $this->ServiceTranslations = array();
        $ServiceTranslations = ServiceTranslation::all();
        foreach ($ServiceTranslations as $ServiceTranslation) {
            $one_ServiceTranslation = new ShowServiceTranslationVM($ServiceTranslation->id);
            array_push($this->ServiceTranslations,$one_ServiceTranslation->toArray());
        }
    }
    public function toArray()
    {
        return [
            'ServiceTranslations' => $this->ServiceTranslations
        ];
    }
}
