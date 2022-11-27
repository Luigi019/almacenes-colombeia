<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguridad extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombre', 'slug','usuario_crear','usuario_edit', 'descripcion',     'cantidad','num_bien_nacional', 'imagen_evidencia', ];
}
