<?php

namespace EPSJV\Acl\Traits;

trait HasPapeis
{
    public function hasPapeis($papeis)
    {
        if(is_array($papeis) || is_object($papeis)){
            return !! $papeis->intersect($this->papeis)->count();
        }
        
        return $this->papeis->contains('nome',$papeis);        
    }
    
}