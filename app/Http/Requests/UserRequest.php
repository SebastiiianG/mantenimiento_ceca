<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //valores a guardar en la tabla de la bd
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|string|min:8',
            'user_number' => 'required|integer|unique:users',
        ];
    }

    //funcion para personalizar los mensajes de error de acuerdo a las propiedades de los campos
    public function messages(): array{
        return [
            'name.required' => 'El campo nombre es obligatorio',
            'email.required' => 'El campo correo electrónico es obligatorio',
            'email.email' => 'El campo correo electrónico debe ser un email',
            'email.unique' => 'El correo electrónico ya existe',
            'password.required' => 'El campo contraseña es obligatorio',
            'password.min' => 'El campo contraseña debe tener al menos 8 caracteres',
            'user_number.required' => 'El campo número de empleado es obligatorio',
            'user_number.integer' => 'El campo número de empleado debe ser un número',
            'user_number.unique' => 'El campo número de empleado ya existe',
        ];
    }
}
