<?php


namespace App\Http\ViewModels\General\ServiceTranslations;

use App\Domain\General\ServiceTranslations\Model\ServiceTranslation;
use Illuminate\Contracts\Support\Arrayable;


class ShowServiceTranslationVM implements Arrayable
{

    private $ServiceTranslation;

    public function __construct($ServiceTranslationId)
    {
        $this->ServiceTranslation = ServiceTranslation::find($ServiceTranslationId) ;
    }
    public function toArray()
    {
        return [
            'ServiceTranslation' => $this->ServiceTranslation
        ];
    }
}
