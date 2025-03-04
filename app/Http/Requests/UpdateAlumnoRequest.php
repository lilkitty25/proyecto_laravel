<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAlumnoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Cambiar según lógica de autorización, si es necesario
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Validación del campo 'nombre'
            'nombre' => 'required|string|min:3|max:50',  // Ajusté las reglas para incluir min y max

            // Validación del campo 'email'
            'email' => 'required|email|unique:alumnos,email,' . $this->route('alumno'),

            // Validación del campo 'edad'
            'edad' => 'required|string|max:3',  // Limita a 3 caracteres para edad
        ];
    }

    /**
     * Obtener los mensajes personalizados de validación.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.min' => 'El nombre debe tener al menos 3 caracteres.',
            'nombre.max' => 'El nombre no puede exceder los 50 caracteres.',
            'email.required' => 'El campo email es obligatorio.',
            'email.email' => 'El formato del correo electrónico es inválido.',
            'email.unique' => 'Este email ya está registrado.',
            'edad.required' => 'El campo edad es obligatorio.',
            'edad.max' => 'La edad no puede tener más de 3 caracteres.',
        ];
    }
}
