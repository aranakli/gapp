<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectoTarea extends Model
{
    use HasFactory;
    protected $table = 'vwproyectotareas';
    protected $primaryKey = 'proyecto';
    public $timestamps = false;
}
