<?php

namespace App\Http\Controllers\General\languages;

use App\Domain\General\TranslationLanguages\Actions\CreateTranslationLanguageAction;
use App\Domain\General\TranslationLanguages\Actions\UpdateTranslationLanguageAction;
use App\Domain\General\TranslationLanguages\DTO\TranslationLanguageDTO;
use App\Domain\General\TranslationLanguages\Model\TranslationLanguage;
use App\Exceptions\RequestException;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\General\TranslationLanguage\CreateTranslationLanguageRequest;
use App\Http\Requests\General\TranslationLanguage\DestroyTranslationLanguageRequest;
use App\Http\Requests\General\TranslationLanguage\EditTranslationLanguageRequest;
use App\Http\Requests\General\TranslationLanguage\ShowTranslationLanguageRequest;
use App\Http\Requests\General\TranslationLanguage\UpdateTranslationLanguageRequest;
use App\Http\ViewModels\General\Languges\LanguagesIndexVM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LanguageController extends Controller
{
    public function create(CreateTranslationLanguageRequest $createTranslationLanguageRequest){
        $translationLanguageDTO = TranslationLanguageDTO::fromRequest($createTranslationLanguageRequest->json()->all());
        $translationLanguage = CreateTranslationLanguageAction::execute($translationLanguageDTO);

        $response = Helpers::createSuccessResponse($translationLanguage);

        return response()->json($response);
    }
    public function update(UpdateTranslationLanguageRequest $updateTranslationLanguageRequest){
        $translationLanguageDTO = TranslationLanguageDTO::fromRequest($updateTranslationLanguageRequest->json()->all());
        $translationLanguage = UpdateTranslationLanguageAction::execute(TranslationLanguage::find($updateTranslationLanguageRequest->json('id')),$translationLanguageDTO);

        $response = Helpers::createSuccessResponse($translationLanguage);

        return response()->json($response);
    }
    public function destroy(DestroyTranslationLanguageRequest $destroyTranslationLanguageRequest){
        $translationLanguage = TranslationLanguage::find($destroyTranslationLanguageRequest->json('id'));
        $translationLanguage->deleted_by_user_id = Auth::id();
        $translationLanguage->save();
        $translationLanguage->delete();

        $response = Helpers::createSuccessResponse('deleted successfully.');

        return response()->json($response);
    }
    public function index(){
        $translationLanguages = new LanguagesIndexVM() ;

        $response = Helpers::createSuccessResponse($translationLanguages->toArray());

        return response()->json($response);
    }
    public function show(ShowTranslationLanguageRequest $showTranslationLanguageRequest){
        $translationLanguage = TranslationLanguage::find($showTranslationLanguageRequest->json('id'));
        $response = Helpers::createSuccessResponse($translationLanguage);

        return response()->json($response);
    }
    public function edit(EditTranslationLanguageRequest $editTranslationLanguageRequest){
        $translationLanguage = TranslationLanguage::find($editTranslationLanguageRequest->json('id'));
        $response = Helpers::createSuccessResponse($translationLanguage);

        return response()->json($response);
    }
}
