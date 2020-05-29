<?php

use EPSJV\Acl\Permissao;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AclPermissaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $horaAtual = Carbon::now()->toDateTimeString();

        $arrListagemPermissoes = array(
            array('nome' => 'ler_usuario', 'descricao' => 'Ler usuário', 'created_at' => $horaAtual, 'updated_at' => $horaAtual),
            array('nome' => 'criar_usuario', 'descricao' => 'Criar usuário', 'created_at' => $horaAtual, 'updated_at' => $horaAtual),
            array('nome' => 'editar_usuario', 'descricao' => 'Editar usuário', 'created_at' => $horaAtual, 'updated_at' => $horaAtual),
            array('nome' => 'excluir_usuario', 'descricao' => 'Excluir usuário', 'created_at' => $horaAtual, 'updated_at' => $horaAtual),
            array('nome' => 'ler_todos_usuario', 'descricao' => 'Ler todos os usuários', 'created_at' => $horaAtual, 'updated_at' => $horaAtual),
            array('nome' => 'gerenciar_usuario', 'descricao' => 'Gerenciar pelo menos uma ação em usuários', 'created_at' => $horaAtual, 'updated_at' => $horaAtual),

            array('nome' => 'ler_permissao', 'descricao' => 'Ler permissão', 'created_at' => $horaAtual, 'updated_at' => $horaAtual),
            array('nome' => 'criar_permissao', 'descricao' => 'Criar permissão', 'created_at' => $horaAtual, 'updated_at' => $horaAtual),
            array('nome' => 'editar_permissao', 'descricao' => 'Editar permissão', 'created_at' => $horaAtual, 'updated_at' => $horaAtual),
            array('nome' => 'excluir_permissao', 'descricao' => 'Excluir permissão', 'created_at' => $horaAtual, 'updated_at' => $horaAtual),
            array('nome' => 'ler_todos_permissao', 'descricao' => 'Ler todas as permissões', 'created_at' => $horaAtual, 'updated_at' => $horaAtual),
            array('nome' => 'gerenciar_permissao', 'descricao' => 'Gerenciar pelo menos uma ação em permissões', 'created_at' => $horaAtual, 'updated_at' => $horaAtual),

            array('nome' => 'ler_papel', 'descricao' => 'Ler papel', 'created_at' => $horaAtual, 'updated_at' => $horaAtual),
            array('nome' => 'criar_papel', 'descricao' => 'Criar papel', 'created_at' => $horaAtual, 'updated_at' => $horaAtual),
            array('nome' => 'editar_papel', 'descricao' => 'Editar papel', 'created_at' => $horaAtual, 'updated_at' => $horaAtual),
            array('nome' => 'excluir_papel', 'descricao' => 'Excluir papel', 'created_at' => $horaAtual, 'updated_at' => $horaAtual),    
            array('nome' => 'ler_todos_papel', 'descricao' => 'Ler todos os papeis', 'created_at' => $horaAtual, 'updated_at' => $horaAtual),
            array('nome' => 'gerenciar_papel', 'descricao' => 'Gerenciar pelo menos uma ação em papeis', 'created_at' => $horaAtual, 'updated_at' => $horaAtual),
        );

        Permissao::insert($arrListagemPermissoes);
    }
}