<?php

namespace EPSJV\Acl\Traits;

use EPSJV\Acl\Papel;
use EPSJV\Acl\PapelUser;
use EPSJV\Acl\Permissao;

trait HasPapeis
{
    /**
     * Verifica se a permission encontrada está contida na lista de permissions associada ao papel do usuário
     *
     * @param Permissao $permissao
     * @return true
     * 
     * @example view - Para usar na view blade, é necessário envolver o trecho de código que deseja autorizar 
     *              com o nome da permission usando a facade @can ou @cannot    
     * 
     *          @can('editar_curso', $cursos) 
     *                  {{-- código aqui --}}
     *          @endcan
     * @example controller - Para usar no controller, basta chamar o método authorize no início de cada action, passando o nome da permission e o $model
     * 
     *           public function edit(Curso $curso)
     *           {
     *                  $this->authorize('editar_curso', $curso);
     *           }
     * @example rota - Para usar na rota, basta chamar uma middleware, passando a chave 'can' e o nome da permission que deseja autorizar
     * 
     *           Route::get('edit/{curso}', 'CursoController@edit')->name('curso.edit')->middleware('can:editar_curso');
     *
     */

    public function possuiPermissao(Permissao $permissao)
    {
        return $this->checarPapel($permissao->papeis);     
    }
    
    public function checarPapel($papeis)
    {
        if(is_array($papeis) || is_object($papeis)){
            return !! $papeis->intersect($this->papeis)->count();
        }
        
        return $this->papeis->contains('nome',$papeis);        
    }

    public function papeis()
    {
        return $this->belongsToMany(Papel::class, PapelUser::class);
    }
    
}