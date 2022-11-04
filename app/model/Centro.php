<?php

class Centro extends TRecord
{
    const TABLENAME  = 'centro';
    const PRIMARYKEY = 'id';
    const IDPOLICY   =  'serial'; // {max, serial}

    

    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('nome');
            
    }

    /**
     * Method getDepartamentos
     */
    public function getDepartamentos()
    {
        $criteria = new TCriteria;
        $criteria->add(new TFilter('area_id', '=', $this->id));
        return Departamento::getObjects( $criteria );
    }

    public function set_departamento_area_to_string($departamento_area_to_string)
    {
        if(is_array($departamento_area_to_string))
        {
            $values = Centro::where('id', 'in', $departamento_area_to_string)->getIndexedArray('nome', 'nome');
            $this->departamento_area_to_string = implode(', ', $values);
        }
        else
        {
            $this->departamento_area_to_string = $departamento_area_to_string;
        }

        $this->vdata['departamento_area_to_string'] = $this->departamento_area_to_string;
    }

    public function get_departamento_area_to_string()
    {
        if(!empty($this->departamento_area_to_string))
        {
            return $this->departamento_area_to_string;
        }
    
        $values = Departamento::where('area_id', '=', $this->id)->getIndexedArray('area_id','{area->nome}');
        return implode(', ', $values);
    }

    
}

