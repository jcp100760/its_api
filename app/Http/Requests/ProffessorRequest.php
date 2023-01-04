<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProffessorRequest extends FormRequest
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
            'name' => 'string|required|min:5|max:50',
            'lastname' => 'string|min:5|max:255',
            'ci' => 'int|min:8|max:8',
        ];
    }

    public function messages()
{
    return [
        'name.required' => 'El campo nombre es requerido',
        'name.min' => 'El minimo de caracteres aceptado es 5',
        'ci.int' => 'Este campo es numerico',
        'ci.min' => 'El numero de caracteres es 8'
    ];
}
}
