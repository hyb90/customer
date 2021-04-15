<?php


namespace App\Http\Requests\General\ProjectFile;


use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectFileRequest extends FormRequest
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
            'id'    => 'required|integer|exists:project_files,id,deleted_at,NULL',

            'file_name' => 'string|required',
            'file_path' => 'string|required',
        ];
    }
    public function validationData(): array
    {
        return $this->json()->all();
    }
}
