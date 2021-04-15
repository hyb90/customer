<?php


namespace App\Http\Requests\General\Device\DeviceTypes;


use Illuminate\Foundation\Http\FormRequest;

class UpdateDeviceTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'        =>'integer|required|exists:device_types,id,deleted_at,NULL',
            'name'      => 'string|required',
            'parent_id' => 'integer|nullable|exists:device_types,id',
        ];
    }
    public function validationData(): array
    {
        return $this->json()->all();
    }
}
