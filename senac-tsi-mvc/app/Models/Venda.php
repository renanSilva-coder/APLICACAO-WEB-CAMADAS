<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [ 'id',
                            'cliente_id',
                            'funcionario_id',
                            'data_venda',
                            'valor',
                        ];

    protected $table = 'Vendas';

    public function cliente(){
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

}
