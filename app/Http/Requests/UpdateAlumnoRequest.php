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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [];
        
        if ($this->filled('nombre')) {
            $rules['nombre'] = 'string|min:3|max:50';
        }
        
        // Solo validar email si se está cambiando y es diferente al actual
        if ($this->filled('email') && $this->email !== $this->route('alumno')->email) {
            $rules['email'] = 'email|unique:alumnos,email';
        }
        
        if ($this->filled('dni')) {
            $rules['dni'] = 'string|max:9';
        }
        
        if ($this->has('idiomas')) {
            $rules['idiomas'] = 'array';
            $rules['idiomas.*'] = 'string';
            $rules['nivel'] = 'array';
            $rules['nivel.*'] = 'nullable|string|in:A1,A2,B1,B2,C1,C2';
            $rules['titulo'] = 'array';
            $rules['titulo.*'] = 'nullable|string|max:100';
        }

        return $rules;
    }

    /**
     * Obtener los mensajes personalizados de validación.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'nombre.min' => 'El nombre debe tener al menos 3 caracteres.',
            'nombre.max' => 'El nombre no puede exceder los 50 caracteres.',
            'email.email' => 'El formato del correo electrónico es inválido.',
            'email.unique' => 'Este email ya está registrado.',
            'dni.max' => 'El DNI no puede exceder los 9 caracteres.',
            'nivel.*.in' => 'El nivel debe ser uno de los siguientes: A1, A2, B1, B2, C1, C2',
            'titulo.*.max' => 'El título no puede exceder los 100 caracteres.'
        ];
    }
}
