<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = [ 'id',
                            'nome',
                            'email',
                            'telefone',
                            'endereco'];

    
    //se voce não colocar o comando abaixo para nomear
    //a tabela, o Eloquent cria o nome em inglês e no 
    // plural 
    protected $table = 'Funcionarios';

    /**
     * É POSSÍVEL MUDAR A CHAVE PRIMÁRIA ASSIM:
     * protected $primarykey = 'nome_da_pk';
     * 
     * SE NÃO QUISER QUE SEJA AUTO INCREMENT 
     * public $increment = false;
     * 
     * PARA DEFINIR O TIPO 
     * protected $keyType = 'string';
     * 
     * PARA TIRAR OS CAMPOS TIMESTAMPS
     * public $timestamps = false;
     * 
     */


}
