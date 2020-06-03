<?php

namespace EPSJV\Acl;

use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{

    protected $fillable = ['nome', 'descricao'];

    protected $table = 'permissoes';

    /**
     * Retorna todos os papeis com a permissão.
     *
     * @return collection
     */
    public function papeis()
    {
        return $this->belongsToMany(Papel::class, PapelPermissao::class);
    }
}
