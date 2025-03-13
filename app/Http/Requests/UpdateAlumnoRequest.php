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
            'nombre' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:alumnos,email,' . $this->route('alumno')->id,
            'dni' => 'required|string|max:9',
            'idiomas' => 'nullable|array',
            'idiomas.*' => 'string',
            'nivel' => 'nullable|array',
            'nivel.*' => 'nullable|string|in:A1,A2,B1,B2,C1,C2',
            'titulo' => 'nullable|array',
            'titulo.*' => 'nullable|string|max:100'
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
            'dni.required' => 'El campo DNI es obligatorio.',
            'dni.max' => 'El DNI no puede tener más de 9 caracteres.',
            'idiomas.array' => 'El formato de idiomas no es válido.',
            'nivel.*.in' => 'El nivel debe ser uno de los siguientes: A1, A2, B1, B2, C1, C2',
            'titulo.*.max' => 'El título no puede exceder los 100 caracteres.'
        ];
    }
}
