<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAlumnoRequest extends FormRequest
{
    /**
<<<<<<< Updated upstream
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
            'nombre' => 'required|min:3|max:50',
            //
        ];
    }
    public function messages(): array{
        return [
            "nombre.required" => "El campo nombre es obligatorio!!!!!",
=======
     * Autoriza la solicitud.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Cambiar según lógica de autorización, si es necesario
    }

    /**
     * Obtiene las reglas de validación para la solicitud.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // Validación del campo 'nombre'
            'nombre' => 'required|string|max:255',

            // Validación del campo 'email'
            // El 'unique' tiene en cuenta que el email debe ser único, excepto para el registro actual
            'email' => 'required|email|unique:alumnos,email,' . $this->route('alumno'),

            // Validación del campo 'edad' (puede ser un string, limitando su longitud)
            'edad' => 'required|string|max:3',  // Limita a 3 caracteres
>>>>>>> Stashed changes
        ];
    }
}
