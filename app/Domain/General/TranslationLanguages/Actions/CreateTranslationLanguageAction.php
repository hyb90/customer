<?php


namespace App\Domain\General\TranslationLanguages\Actions;



use App\Domain\General\TranslationLanguages\DTO\TranslationLanguageDTO;
use App\Domain\General\TranslationLanguages\Model\TranslationLanguage;

class CreateTranslationLanguageAction
{


    public static function execute(
        TranslationLanguageDTO $translationLanguageDTO
    ){
        $translationLanguage = new TranslationLanguage($translationLanguageDTO->toArray());
        $translationLanguage->save() ;
        return $translationLanguage ;
    }
}
