<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $table = 'alumnos';
    protected $fillable = ['nombre', 'email', 'dni'];

    // Relación con la tabla 'idiomas'
    public function idiomas()
    {
        return $this->hasMany(Idioma::class);
    }
}
