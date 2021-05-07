<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;


class Cliente extends Model
{
    use HasFactory;
    use HasRoles;

    protected $fillable = [ 'id',
                            'nome',
                            'endereco',
                            'email',
                            'nascimento',
                        ];

    protected $table = 'Cliente';
 
    //metodo que contrói o relacionamento entre tabelas, herdo hasMany de Model
    public function vendas(){//model de destino(model que estou relacionando com Model Cliente)
        return $this->hasMany(Venda::class, 'cliente_id');//pego tudo que tem na classe Venda, e digo onde ta locazido o id do cliente na Model Venda é 'cliente_id';
        //retorn Cliente tem varias Venda, e a chave la do cliente é 'cliente_id'
    
    }


}
