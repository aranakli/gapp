<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectoMiembro extends Model
{
    use HasFactory;
    protected $table = 'proyecto_miembros';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
