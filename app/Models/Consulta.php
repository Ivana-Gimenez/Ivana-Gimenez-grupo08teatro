<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Consulta;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'email', 'telefono', 'mensaje', 'tipo_consulta','leido'];
}
