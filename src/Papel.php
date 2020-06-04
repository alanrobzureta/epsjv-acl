<?php

namespace EPSJV\Acl;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Papel extends Model
{
    protected $fillable = ['nome', 'descricao'];
    
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

    public function users()
    {
        return $this->belongsToMany(User::class,PapelUser::class);
    }
}
