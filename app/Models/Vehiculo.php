<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    // Campos permitidos para insercion masiva
    protected $fillable = ['marca', 'modelo', 'anio', 'color'];
}