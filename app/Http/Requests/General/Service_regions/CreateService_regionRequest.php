<?php


namespace App\Http\Requests\General\Service_regions;


use Illuminate\Foundation\Http\FormRequest;

class CreateService_regionRequest extends FormRequest
{
    public function authorize()
    {
//        return Gate::allows('admin.');
        return true;
    }

    public function rules()
    {
        $this->json()->remove('updated_by_user_id') ;
        $this->json()->remove('deleted_by_user_id') ;
        return [
            'service_id'            => 'required|exists:services,id' ,
            'region_id'             => 'required|exists:regions,id' ,
            'created_by_user_id'    => 'required|exists:users,id' ,
            'updated_by_user_id'    => 'nullable|exists:users,id' ,
            'deleted_by_user_id'    => 'nullable|exists:users,id' ,
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
