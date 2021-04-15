<?php


namespace App\Http\Requests\General\ProjectFile;


use Illuminate\Foundation\Http\FormRequest;

class CreateProjectFileRequest extends FormRequest
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
            'file_name' => 'string|required|unique:project_files',
            'file_path' => 'string|required|unique:project_files',
        ];
    }
    public function validationData(): array
    {
        return $this->json()->all();
    }
}
