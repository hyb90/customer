<?php


namespace App\Http\Requests\ServiceTranslations;


use Illuminate\Foundation\Http\FormRequest;

class DestroyServiceTranslationRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        $this->json()->remove('created_by_user_id');
        $this->json()->remove('updated_by_user_id');
        return [
			'id' 	 => 'required|exists:service_translations,id' ,
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
