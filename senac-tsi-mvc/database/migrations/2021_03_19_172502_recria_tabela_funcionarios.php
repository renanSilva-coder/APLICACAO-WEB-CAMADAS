<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecriaTabelaFuncionarios extends Migration
{

    public function up()
    {
        Schema::create('Funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email');
            $table->bigInteger('telefone');
            $table->string('endereco');
            $table->timestamps();

            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('Funcionarios');
    }
}
