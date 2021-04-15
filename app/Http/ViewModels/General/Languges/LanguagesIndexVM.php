<?php


namespace App\Http\ViewModels\General\Languges;


use App\Domain\General\TranslationLanguages\Model\TranslationLanguage;
use Illuminate\Contracts\Support\Arrayable;

class LanguagesIndexVM implements Arrayable
{
    private $languages;

    public function __construct()
    {
        $this->languages = TranslationLanguage::all();
    }
    public function toArray()
    {
        return [
          'languages' => $this->languages
        ];
    }

}
