<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellido', 'edad', 'id_alumno'];

    public function materias()
    {
        return $this->belongsToMany(Materia::class, 'matriculas');
    }
}
