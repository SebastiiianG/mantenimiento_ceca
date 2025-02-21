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
            'name' => 'required|string|max:50',
            'email' => [
                'required',
                'email',
                'max:100',
                Rule::unique('users')->ignore($this->user), // Evita error en actualización
            ],
            'password' => $this->isMethod('post') ? 'required|string|min:8' : 'sometimes|nullable|string|min:8',
            'user_number' => [
                'required',
                'integer',
                Rule::unique('users')->ignore($this->user), // Evita error en actualización
            ],
            'status' => 'required|boolean',
            'role' => 'required|string|exists:roles,name' // Asegura que el rol existe en la BD
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser válido.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'user_number.required' => 'El número de empleado es obligatorio.',
            'user_number.integer' => 'El número de empleado debe ser un número.',
            'user_number.unique' => 'Este número de empleado ya está registrado.',
        ];
    }
}
