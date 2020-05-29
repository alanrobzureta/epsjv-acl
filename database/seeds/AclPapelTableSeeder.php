<?php

use EPSJV\Acl\Papel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AclPapelTableSeeder extends Seeder
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
            array('nome' => 'Administrador', 'descricao' => 'Administradores do Sistema', 'created_at' => $horaAtual, 'updated_at' => $horaAtual),
        );

        Papel::insert($lista);
    }
}
