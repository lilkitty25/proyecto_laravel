<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    protected $fillable = ['idioma', 'nivel', 'titulo', 'alumno_id'];
    //
    public function alumno(){
        return $this->belongsTo(Alumno::class);
    }

}
