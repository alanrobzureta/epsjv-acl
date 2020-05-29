<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelaPapeis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Verificar se existe o Schema
        if (!Schema::hasTable('papeis')) {
            // Se não existir, vamos criá-lo
            Schema::create('papeis', function (Blueprint $table) {
                $table->bigIncrements('id');
            });
        }
        // Criar os atributos da tabela
        Schema::table('papeis', function (Blueprint $table) {
            $table->string('nome')
                ->unique()
                ->nullable(false);
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
        Schema::table('papeis', function (Blueprint $table) {
            Schema::dropIfExists('papeis');
        });
    }
}
