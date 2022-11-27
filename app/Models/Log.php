<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $fillable =
    [   
        'usuario_name',
        'mac',
        'ip',
        'area', 
        'accion',
        'id_campo',
        'nombre_campo',
    ];
}
