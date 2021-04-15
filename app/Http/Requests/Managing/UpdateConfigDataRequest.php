<?php


namespace App\Http\Requests\Managing;


use Illuminate\Foundation\Http\FormRequest;

class UpdateConfigDataRequest extends FormRequest
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
        $this->json()->remove('created_by_user_id');
        $this->json()->remove('deleted_by_user_id');
        return [

            'updated_by_user_id'            =>  'required|exists:users,id',
        ];
    }
    public function validationData():array
    {
        return $this->json()->all();
    }
}
