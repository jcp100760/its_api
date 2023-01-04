<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
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
            'grade' => 'int|required',
            'name' => 'string|min:2|max:255',
            'description' => 'string|min:5|max:255',
        ];
    }

    public function messages()
    {
        return [
            'grade.required' => 'El campo nombre es requerido',
            'grade.int' => 'Este campo es numerico',
            'name.min' => 'El minimo de caracteres aceptado es 2',          
            'description.min' => 'El minimo de caracteres aceptado es 5'
        ];
    }
}
