<?php

use EPSJV\Acl\PapelPermissao;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AclPapelPermissaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $horaAtual = Carbon::now()->toDateTimeString();

        $lista = array(
            /**
             * Papel               |   ID
             * Chefe da Informatica|   1
             * Chefe de Compras    |   2
             * Administrador       |   3
             */
            
            // Permissões Administrador
                // Usuario
                    array( 'papel_id' => 1, 'permissao_id' => 1,), // ler
                    array( 'papel_id' => 1, 'permissao_id' => 2,), // criar
                    array( 'papel_id' => 1, 'permissao_id' => 3,), // editar
                    array( 'papel_id' => 1, 'permissao_id' => 4,), // excluir
                    array( 'papel_id' => 1, 'permissao_id' => 5,), // ler todos
                    array( 'papel_id' => 1, 'permissao_id' => 6,), // gerenciar usuario
                
                // Permissao
                    array( 'papel_id' => 1, 'permissao_id' => 7,),  // ler
                    array( 'papel_id' => 1, 'permissao_id' => 8,),  // criar
                    array( 'papel_id' => 1, 'permissao_id' => 9,),  // editar
                    array( 'papel_id' => 1, 'permissao_id' => 10,), // excluir
                    array( 'papel_id' => 1, 'permissao_id' => 11,), // ler todos
                    array( 'papel_id' => 1, 'permissao_id' => 12,), // gerenciar permissao
                // Papel
                    array( 'papel_id' => 1, 'permissao_id' => 13,), // ler
                    array( 'papel_id' => 1, 'permissao_id' => 14,), // criar
                    array( 'papel_id' => 1, 'permissao_id' => 15,), // editar
                    array( 'papel_id' => 1, 'permissao_id' => 16,), // excluir
                    array( 'papel_id' => 1, 'permissao_id' => 17,), // ler todos
                    array( 'papel_id' => 1, 'permissao_id' => 18,), // gerenciar_papel
        );

        PapelPermissao::insert($lista);
    }
}