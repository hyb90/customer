<?php


namespace App\Domain\General\TranslationLanguages\Actions;


use App\Domain\General\TranslationLanguages\DTO\TranslationLanguageDTO;
use App\Domain\General\TranslationLanguages\Model\TranslationLanguage;
use Illuminate\Support\Facades\Auth;

class UpdateTranslationLanguageAction
{

    public static function execute(
        TranslationLanguage $translationLanguage,
        TranslationLanguageDTO $translationLanguageDTO
    ){
        $translationLanguage->update($translationLanguageDTO->toArray());
        $translationLanguage->updated_by_user_id = Auth::id();
        $translationLanguage->save() ;
        return $translationLanguage ;
    }
}
