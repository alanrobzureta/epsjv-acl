<?php

namespace EPSJV\Acl\Traits;

use App\User;
use EPSJV\Acl\Permissao;
use Illuminate\Support\Facades\Gate;

trait MakeAuthorizations
{
    /**
     * Criação das Regras de Controle de acesso baseadas em papéis
     * 
     * Cria dinamicamente a regra de autorização de acordo com cada item de permissão. Ex.: editar_curso
     */
    public function makeAuthorizations()
    {
        $permissoes = Permissao::with('papeis')->get();
        
        foreach ($permissoes as $permissao) {
            Gate::define($permissao->nome, function(User $user) use ($permissao) {                                        
                return $user->hasPapeis($permissao->papeis); 
            });            
        }
    }
    
}
