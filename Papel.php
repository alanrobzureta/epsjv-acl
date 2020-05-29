<?php

namespace EPSJV\Acl;

use Illuminate\Database\Eloquent\Model;

class Papel extends Model
{
    protected $table = 'papeis';

    /**
     * Retorna todas as permissões com o papel.
     *
     * @return collection
     */
    public function permissoes()
    {
        return $this->belongsToMany(Permissao::class,PapelPermissao::class);
    }
}
