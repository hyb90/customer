<?php


namespace App\Http\Requests\ServiceTranslations;


use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceTranslationRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        $this->json()->remove('created_by_user_id');
        $this->json()->remove('deleted_by_user_id');
        return [
			'service_id' 				=> 'required|exists:services,id' ,
			'translation_lang_id' 		=> 'required|exists:translation_languages,id' ,
			'name' 					    => 'required' ,
			'description' 				=> 'nullable' ,
			'updated_by_user_id' 		=> 'required|exists:users,id' ,

        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
