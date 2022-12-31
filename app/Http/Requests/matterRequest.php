<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
//use App\Models\Matter;


class matterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'string|required|unique:matter|min:5|max:50',
            'description' => 'string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre de la materia es requerido',
        ];
    }

}
