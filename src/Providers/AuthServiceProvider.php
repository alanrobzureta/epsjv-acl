<?php

namespace EPSJV\Acl\Providers;

use App\User;
use EPSJV\Acl\Permissao;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => 'EPSJV\Acl\Policies\UserPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        // Verificar se existe a tabela users no banco de dados
        if(Schema::hasTable('users')){

            $this->registerPolicies();

            /* Habilita o administrador ter acesso irrestrito ao sistema. */
            // Gate::before(function(User $user, $ability)  {  
            //     if($user->isSystemAdmin())
            //         return true;            
            // }); 

            /**
             * Criação das Regras de Controle de acesso baseadas em papéis
             * 
             * Cria dinamicamente a regra de autorização de acordo com cada item de permissão. Ex.: editar_curso
             */
            $permissoes = Permissao::with('papeis')->get();
            foreach ($permissoes as $permissao) {
                Gate::define($permissao->nome, function(User $user) use ($permissao) {                                        
                    return $user->possuiPermissao($permissao); 
                });            
            }

        }
    }
}
