<?php

namespace EPSJV\Acl;

use Illuminate\Database\Eloquent\Model;

class PapelPermissao extends Model
{
    protected $table = 'papel_permissao';

    protected $fillable = ['papel_id', 'permissao_id'];

}
