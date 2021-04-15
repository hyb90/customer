<?php


namespace App\Http\Requests\Managing;


use Illuminate\Foundation\Http\FormRequest;

class SetConfigsRequest extends FormRequest
{

    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules(){
        $this->json()->remove('deleted_by_user_id');
        return [

            'created_by_user_id'            =>  'nullable|exists:admins,id,deleted_at,NULL',
            'updated_by_user_id'            =>  'nullable|exists:admins,id,deleted_at,NULL',
        ];
    }
    public function validationData():array
    {
        return $this->json()->all();
    }
}
