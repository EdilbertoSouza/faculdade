<?php

class Funcionario extends TRecord
{
    const TABLENAME  = 'funcionario';
    const PRIMARYKEY = 'id';
    const IDPOLICY   =  'serial'; // {max, serial}

    private $departamento;

    

    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('nome');
        parent::addAttribute('admissao');
        parent::addAttribute('departamento_id');
            
    }

    /**
     * Method set_departamento
     * Sample of usage: $var->departamento = $object;
     * @param $object Instance of Departamento
     */
    public function set_departamento(Departamento $object)
    {
        $this->departamento = $object;
        $this->departamento_id = $object->id;
    }

    /**
     * Method get_departamento
     * Sample of usage: $var->departamento->attribute;
     * @returns Departamento instance
     */
    public function get_departamento()
    {
    
        // loads the associated object
        if (empty($this->departamento))
            $this->departamento = new Departamento($this->departamento_id);
    
        // returns the associated object
        return $this->departamento;
    }

    
}

