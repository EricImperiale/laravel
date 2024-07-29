<?php

namespace App\Http\Requests\Garantes;

use App\Rules\IgualDniCuit;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => [
                'required',
                'numeric',
                'digits:8',
                'unique:garantes,dni',
            ],
            'cuit' => [
                'required',
                'numeric',
                'digits:11',
                'unique:garantes,cuit',
                new IgualDniCuit,
            ],
            'email' => 'required|email|unique:garantes,email',
            'direccion' => 'required',
            'cuidad' => 'required',
            'pais' => 'required',
            'provincia' => 'required',
            'barrio' => 'required',
            'codigo_postal' => 'required|numeric',
            'prefijo_telefonico_fk_id' => 'required',
            'codigo_de_area' => 'required',
            'numero_de_telefono' => 'required',
            'fecha_de_nacimiento' => [
                'required',
                'date',
                'before_or_equal:' . now()->format('Y-m-d'),
            ],
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',

            'apellido.required' => 'El apellido es obligatorio.',

            'dni.required' => 'El DNI es obligatorio.',
            'dni.numeric' => 'El DNI debe ser un número.',
            'dni.digits' => 'El DNI debe tener :digits dígitos.',
            'dni.unique' => 'El DNI ya está registrado.',

            'cuit.required' => 'El CUIT es obligatorio.',
            'cuit.numeric' => 'El CUIT debe ser un número.',
            'cuit.digits' => 'El CUIT debe tener :digits dígitos.',
            'cuit.unique' => 'El CUIT ya está registrado.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'email.unique' => 'El correo electrónico ya está registrado.',

            'direccion.required' => 'La dirección es obligatoria.',
            'cuidad.required' => 'La ciudad es obligatoria.',
            'pais.required' => 'El país es obligatorio.',
            'provincia.required' => 'La provincia es obligatoria.',
            'barrio.required' => 'El barrio es obligatorio.',

            'codigo_postal.required' => 'El código postal es obligatorio.',
            'codigo_postal.numeric' => 'El código postal debe ser un número.',

            'prefijo_telefonico_fk_id.required' => 'El prefijo telefónico es obligatorio.',
            'codigo_de_area.required' => 'El código de área es obligatorio.',
            'numero_de_telefono.required' => 'El número de teléfono es obligatorio.',

            'fecha_de_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_de_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'fecha_de_nacimiento.before_or_equal' => 'La fecha de nacimiento no puede ser posterior a la fecha actual.',
        ];
    }
}
