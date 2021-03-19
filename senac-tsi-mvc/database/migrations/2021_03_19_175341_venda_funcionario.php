<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VendaFuncionario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('VendaFuncionario', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('funcionario_id')->unsigned();
            $table->bigInteger('venda_id')->unsigned();
            $table->timestamps();

            $table->foreign('venda_id')->references('id')->on(
                'vendas')->onDelete('cascade');
            
            $table->foreign('funcionario_id')->references('id')->on(
                'funcionarios')->onDelete('cascade');

            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    public function down()
    {
        // Schema::dropIfExists('VendaFuncionario');
    }
}
