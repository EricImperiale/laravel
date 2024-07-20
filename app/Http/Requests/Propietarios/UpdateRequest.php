<?php

namespace App\Http\Requests\Propietarios;

use App\Rules\IgualDniCuit;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // TODO: Permitir que solo usuario autenticado.
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = request()->id;

        return [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dni' => [
                'required',
                'numeric',
                'digits:8',
                Rule::unique('propietarios')->ignore($id, 'propietario_id'),
            ],
            'cuit' => [
                'required',
                'numeric',
                'digits:11',
                Rule::unique('propietarios')->ignore($id, 'propietario_id'),
            ],
            'email' => [
                'required',
                Rule::unique('propietarios')->ignore($id, 'propietario_id')
            ],
            'direccion' => 'required|string|max:255',
            'cuidad' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'provincia' => 'required|string|max:255',
            'barrio' => 'required|string|max:255',
            'codigo_postal' => 'required|numeric',
            'prefijo_telefonico_fk_id' => 'required|numeric',
            'codigo_de_area' => 'required|numeric',
            'numero_de_telefono' => 'required|numeric',
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
            'nombre.max_digits' => 'El nombre no puede tener más de 255 caracteres.',
            'apellido.required' => 'El apellido es obligatorio.',
            'apellido.max_digits' => 'El apellido no puede tener más de 255 caracteres.',
            'dni.required' => 'El DNI es obligatorio.',
            'dni.numeric' => 'El DNI debe ser un número.',
            'dni.max_digits' => 'El DNI no puede tener más de 8 dígitos.',
            'dni.unique' => 'El DNI ya está registrado.',
            'cuit.required' => 'El CUIT es obligatorio.',
            'cuit.numeric' => 'El CUIT debe ser un número.',
            'cuit.max_digits' => 'El CUIT no puede tener más de 12 dígitos.',
            'cuit.unique' => 'El CUIT ya está registrado.',
            'cuit.igual_dni_cuit' => 'El DNI y el CUIT deben ser iguales.',
            'email.required' => 'El correo electrónico es obligatorio.',
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
