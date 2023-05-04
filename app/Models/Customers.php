<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'senha',
        'cpf_cnpj',
        'area_atuacao',
        'razao_social',
        'is_company'
    ];
}
