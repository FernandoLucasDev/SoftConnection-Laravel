<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    protected $fillable = [
        'developer',
        'client',
        'nome',
        'descrição',
        'inicio',
        'previsao_termino',
        'porcentagem',
        'is_finished',
        'status'
    ];
}
