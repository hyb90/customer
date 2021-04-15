<?php


namespace App\Http\Requests\General\Services;


use Illuminate\Foundation\Http\FormRequest;

class CreateServiceRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        $this->json()->remove('updated_by_user_id');
        $this->json()->remove('deleted_by_user_id');
        return [
            'names'                  =>  'required|array|min:1',
            'names.*.translation_lang_id'    =>  'required|exists:translation_languages,id',
            'names.*.name'                  =>  'required|string|unique:service_translations,deleted_at,NULL',
            'names.*.description'                  =>  'required|string',
            'verified_by_user_id'   =>  'nullable|exists:users,id,deleted_at,NULL'
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
