<?php

namespace EPSJV\Acl\Traits;

use EPSJV\Acl\Papel;
use EPSJV\Acl\PapelUser;

trait WithPapeis
{
    public function papeis()
    {
        return $this->belongsToMany(Papel::class, PapelUser::class);
    }
}
