<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'senha',
        'profissao',
        'stack',
        'cpf_cnpj',
        'is_company',
        'curriculo'
  ];
}
