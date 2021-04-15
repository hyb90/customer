<?php

namespace App\Http\Controllers\Managing;

use App\Domain\Content\Carts\Actions\CheckCartsForCleaningAction;
use App\Domain\Managing\Configs\Actions\SetConfigsAction;
use App\Domain\Managing\Configs\DTO\ConfigsDTO;
use App\Domain\General\Sitinfo\Actions\AddConvertionAction;
use App\Domain\General\Sitinfo\DTO\SitinfoDTO;
use App\Domain\General\TranslationLanguages\Actions\CreateTranslationLanguageAction;
use App\Domain\General\TranslationLanguages\DTO\TranslationLanguageDTO;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Managing\SetConfigsRequest;
use App\Http\Requests\Managing\UpdateConfigDataRequest;
use App\Http\Requests\General\TranslationLanguage\CreateTranslationLanguageRequest;
use Illuminate\Http\Request;

class ManagingController extends Controller
{
    /**
     * Display the view of the resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUpload(Request $request)
    {
        $target_input=$request->target_input;
        $target_img=$request->target_img;
        $arr = Array('target_input' => $target_input, 'target_img' =>$target_img);
        return view('imageUpload',$arr);
    }

    /**
     * Store the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        $imageName = $request->file_name .time(). '.' . $request->file->getClientOriginalExtension();

        return "the file added successfully : ".$request->file->move(public_path('images').$request->file_path, $imageName);

//        return back()->with('success', 'You have successfully upload image.')->with('image', $imageName);
    }


    public function add_convertions(Request $request){

        $sitinfoDTO = SitinfoDTO::fromRequest($request->json()->all());
        $sitinfo = AddConvertionAction::execute($sitinfoDTO);

        $response = Helpers::createSuccessResponse($sitinfo);

        return response()->json($response);
    }


    public function set_configs(SetConfigsRequest $setConfigsRequest){
        $configsDTO = ConfigsDTO::fromRequest($setConfigsRequest->json()->all());
        $config = SetConfigsAction::execute($configsDTO);

        $response = Helpers::createSuccessResponse($config);
        return response()->json($response);
    }

}
