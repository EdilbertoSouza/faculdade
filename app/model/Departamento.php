<?php

class Departamento extends TRecord
{
    const TABLENAME  = 'departamento';
    const PRIMARYKEY = 'id';
    const IDPOLICY   =  'serial'; // {max, serial}

    private $area;

    

    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('nome');
        parent::addAttribute('area_id');
            
    }

    /**
     * Method set_centro
     * Sample of usage: $var->centro = $object;
     * @param $object Instance of Centro
     */
    public function set_area(Centro $object)
    {
        $this->area = $object;
        $this->area_id = $object->id;
    }

    /**
     * Method get_area
     * Sample of usage: $var->area->attribute;
     * @returns Centro instance
     */
    public function get_area()
    {
    
        // loads the associated object
        if (empty($this->area))
            $this->area = new Centro($this->area_id);
    
        // returns the associated object
        return $this->area;
    }

    /**
     * Method getDisciplinas
     */
    public function getDisciplinas()
    {
        $criteria = new TCriteria;
        $criteria->add(new TFilter('depto_id', '=', $this->id));
        return Disciplina::getObjects( $criteria );
    }
    /**
     * Method getFuncionarios
     */
    public function getFuncionarios()
    {
        $criteria = new TCriteria;
        $criteria->add(new TFilter('departamento_id', '=', $this->id));
        return Funcionario::getObjects( $criteria );
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
    
        $values = Disciplina::where('depto_id', '=', $this->id)->getIndexedArray('prof_id','{prof->nome}');
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
    
        $values = Disciplina::where('depto_id', '=', $this->id)->getIndexedArray('depto_id','{depto->nome}');
        return implode(', ', $values);
    }

    public function set_funcionario_departamento_to_string($funcionario_departamento_to_string)
    {
        if(is_array($funcionario_departamento_to_string))
        {
            $values = Departamento::where('id', 'in', $funcionario_departamento_to_string)->getIndexedArray('nome', 'nome');
            $this->funcionario_departamento_to_string = implode(', ', $values);
        }
        else
        {
            $this->funcionario_departamento_to_string = $funcionario_departamento_to_string;
        }

        $this->vdata['funcionario_departamento_to_string'] = $this->funcionario_departamento_to_string;
    }

    public function get_funcionario_departamento_to_string()
    {
        if(!empty($this->funcionario_departamento_to_string))
        {
            return $this->funcionario_departamento_to_string;
        }
    
        $values = Funcionario::where('departamento_id', '=', $this->id)->getIndexedArray('departamento_id','{departamento->nome}');
        return implode(', ', $values);
    }

    
}

