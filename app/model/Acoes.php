<?php

class Acoes extends TRecord
{
    const TABLENAME  = 'acoes';
    const PRIMARYKEY = 'id';
    const IDPOLICY   =  'serial'; // {max, serial}

    

    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('nome');
        parent::addAttribute('modulo');
        parent::addAttribute('status');
            
    }

    
}

