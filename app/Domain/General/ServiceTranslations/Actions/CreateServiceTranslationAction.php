<?php


namespace App\Domain\General\ServiceTranslations\Actions;


use App\Domain\General\ServiceTranslations\DTO\ServiceTranslationDTO;
use App\Domain\General\ServiceTranslations\Model\ServiceTranslation;
use Illuminate\Support\Facades\Auth;

class CreateServiceTranslationAction
{
    public static function execute(
        ServiceTranslationDTO $ServiceTranslationDTO
    ){

        $ServiceTranslation = new ServiceTranslation(array_filter($ServiceTranslationDTO->toArray()));
        $ServiceTranslation->save();
        return $ServiceTranslation ;
    }
}
