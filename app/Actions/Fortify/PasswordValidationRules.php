<?php

namespace App\Actions\Fortify;

use Illuminate\Validation\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array<int, \Illuminate\Contracts\Validation\Rule|array<mixed>|string>
     */
    protected function passwordRules(): array
    {
        //Define los requisitos de la contraseña, debe ser una cadena de caracteres
        //con una longitud mínima de 4
        return ['required', 'string', Password::min(4), 'confirmed'];
    }
}
