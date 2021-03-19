<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendaFuncionario extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'funcionario_id',
                            'venda_id'
                        ];

    protected $table = 'VendaFuncionario';

    public function funcionarioVenda(){
        return $this->belongsTo(VendaFuncionario::class, 'venda_id');
    }

}
