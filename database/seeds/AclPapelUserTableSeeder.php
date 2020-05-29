<?php

use EPSJV\Acl\PapelUser;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AclPapelUserTableSeeder extends Seeder
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
             * Papel               |   USER                |     ID
             * Administrador       |   admin               |    3 - 1
             */

            // Administrador possui papel Administrador
            array( 'papel_id' => 1, 'user_id' => 1,),   

        );

        PapelUser::insert($lista);
    }
}