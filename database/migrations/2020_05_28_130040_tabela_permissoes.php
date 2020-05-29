<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelaPermissoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Verificar se existe o Schema
        if (!Schema::hasTable('permissoes')) {
            // Se não existir, vamos criá-lo
            Schema::create('permissoes', function (Blueprint $table) {
                $table->bigIncrements('id');
            });
        }
        // Criar os atributos da tabela
        Schema::table('permissoes', function (Blueprint $table) {
            $table->string('nome')->nullable(false);
            $table->string('descricao')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissoes');
    }
}
