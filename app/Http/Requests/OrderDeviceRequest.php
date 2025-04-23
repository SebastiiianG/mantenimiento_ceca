<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderDeviceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function failedAuthorization()
    {
        throw new \Illuminate\Auth\Access\AuthorizationException('No tienes los permisos necesarios para realizar esta acción.');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //reglas para la orden de dispositios
            'status' => 'required|string',
            'cg_kind_object_id' => 'required|integer',
            'model' => 'required|string',
            'cg_brand_id' => 'required|integer',
            'serial_number' => 'nullable|string',
            'computer' => 'required|integer',
            'password' => 'nullable|string',
            'cg_kind_failure_id' => 'required|integer',
            'client_observations' => 'required|string',
            'diagnostic' => 'nullable|string',
            'ceca_observations' => 'nullable|string',
            'ceca_repairs' => 'nullable|integer',
        ];
    }

    public function messages(): array
    {
        return [
            //
            'status.required' => 'El estado es obligatorio.',
            'cg_kind_object_id.required' => 'El tipo de objeto es obligatorio.',
            'model.required' => 'El modelo es obligatorio.',
            'cg_brand_id.required' => 'La marca es obligatoria.',
            'client_observations.required' => 'Las observaciones del cliente son obligatorias.',
            'diagnostic.string' => 'El diagnóstico debe ser una cadena de texto.',
        ];
    }
}
