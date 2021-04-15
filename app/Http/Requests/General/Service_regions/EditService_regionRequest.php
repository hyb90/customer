<?php


namespace App\Http\Requests\General\Service_regions;


use Illuminate\Foundation\Http\FormRequest;

class EditService_regionRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        return [
            'service_regions' 					=> '' ,

        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
