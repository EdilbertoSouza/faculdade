<?php

class Professor extends TRecord
{
    const TABLENAME  = 'professor';
    const PRIMARYKEY = 'id';
    const IDPOLICY   =  'serial'; // {max, serial}

    

    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('nome');
        parent::addAttribute('ende');
        parent::addAttribute('sexo');
        parent::addAttribute('nasc');
        parent::addAttribute('salario');
            
    }

    /**
     * Method getDisciplinas
     */
    public function getDisciplinas()
    {
        $criteria = new TCriteria;
        $criteria->add(new TFilter('prof_id', '=', $this->id));
        return Disciplina::getObjects( $criteria );
    }

    public function set_disciplina_prof_to_string($disciplina_prof_to_string)
    {
        if(is_array($disciplina_prof_to_string))
        {
            $values = Professor::where('id', 'in', $disciplina_prof_to_string)->getIndexedArray('nome', 'nome');
            $this->disciplina_prof_to_string = implode(', ', $values);
        }
        else
        {
            $this->disciplina_prof_to_string = $disciplina_prof_to_string;
        }

        $this->vdata['disciplina_prof_to_string'] = $this->disciplina_prof_to_string;
    }

    public function get_disciplina_prof_to_string()
    {
        if(!empty($this->disciplina_prof_to_string))
        {
            return $this->disciplina_prof_to_string;
        }
    
        $values = Disciplina::where('prof_id', '=', $this->id)->getIndexedArray('prof_id','{prof->nome}');
        return implode(', ', $values);
    }

    public function set_disciplina_depto_to_string($disciplina_depto_to_string)
    {
        if(is_array($disciplina_depto_to_string))
        {
            $values = Departamento::where('id', 'in', $disciplina_depto_to_string)->getIndexedArray('nome', 'nome');
            $this->disciplina_depto_to_string = implode(', ', $values);
        }
        else
        {
            $this->disciplina_depto_to_string = $disciplina_depto_to_string;
        }

        $this->vdata['disciplina_depto_to_string'] = $this->disciplina_depto_to_string;
    }

    public function get_disciplina_depto_to_string()
    {
        if(!empty($this->disciplina_depto_to_string))
        {
            return $this->disciplina_depto_to_string;
        }
    
        $values = Disciplina::where('prof_id', '=', $this->id)->getIndexedArray('depto_id','{depto->nome}');
        return implode(', ', $values);
    }

    
}

