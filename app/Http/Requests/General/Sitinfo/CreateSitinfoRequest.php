<?php


namespace App\Http\Requests\General\Sitinfo;


use Illuminate\Foundation\Http\FormRequest;

class CreateSitinfoRequest extends FormRequest
{


    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }


    public function rules(){
        return [
          'convertion'  => 'string|required',
          'value'       => 'double|required',
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
