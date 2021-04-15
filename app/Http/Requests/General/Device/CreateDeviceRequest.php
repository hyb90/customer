<?php


namespace App\Http\Requests\General\Device;


use App\Exceptions\RequestException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class CreateDeviceRequest extends FormRequest
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
            'name' => 'string|required|unique:devices',
            'description' => 'string|nullable',
            'serial_number' => 'string|required',
            'visites_number' => 'integer|nullable',
            'region_id' => 'integer|required|exists:regions,id',
            'device_types_id' => 'integer|required|exists:device_types,id',
        ];
    }
    public function validationData(): array
    {
        return $this->json()->all();
    }

}
