<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropTabelaFuncionario extends Migration
{
 
    public function up()
    {
        Schema::dropIfExists('Funcionarios');
    }

    public function down()
    {
        //
    }
}
