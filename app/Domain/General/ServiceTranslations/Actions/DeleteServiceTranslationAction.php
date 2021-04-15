<?php


namespace App\Domain\General\ServiceTranslations\Actions;


use App\Domain\General\ServiceTranslations\DTO\ServiceTranslationDTO;
use App\Domain\General\ServiceTranslations\Model\ServiceTranslation;
use Illuminate\Support\Facades\Auth;

class DeleteServiceTranslationAction
{
    public static function execute(
        $ServiceTranslationId
    ){

        $ServiceTranslation = ServiceTranslation::find($ServiceTranslationId);
        $ServiceTranslation->delete();
        return "deleted successfully.";
    }
}
