<?php


namespace App\Http\Requests\General\Services;


use Illuminate\Foundation\Http\FormRequest;

class DestroyServiceRequest extends FormRequest
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
            'id'        =>'required|exists:services,id,deleted_at,NULL',

        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
