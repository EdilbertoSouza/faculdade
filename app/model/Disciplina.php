<?php

class Disciplina extends TRecord
{
    const TABLENAME  = 'disciplina';
    const PRIMARYKEY = 'id';
    const IDPOLICY   =  'serial'; // {max, serial}

    private $depto;
    private $prof;

    

    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('nome');
        parent::addAttribute('prof_id');
        parent::addAttribute('disc_id_pre');
        parent::addAttribute('depto_id');
            
    }

    /**
     * Method set_departamento
     * Sample of usage: $var->departamento = $object;
     * @param $object Instance of Departamento
     */
    public function set_depto(Departamento $object)
    {
        $this->depto = $object;
        $this->depto_id = $object->id;
    }

    /**
     * Method get_depto
     * Sample of usage: $var->depto->attribute;
     * @returns Departamento instance
     */
    public function get_depto()
    {
    
        // loads the associated object
        if (empty($this->depto))
            $this->depto = new Departamento($this->depto_id);
    
        // returns the associated object
        return $this->depto;
    }
    /**
     * Method set_professor
     * Sample of usage: $var->professor = $object;
     * @param $object Instance of Professor
     */
    public function set_prof(Professor $object)
    {
        $this->prof = $object;
        $this->prof_id = $object->id;
    }

    /**
     * Method get_prof
     * Sample of usage: $var->prof->attribute;
     * @returns Professor instance
     */
    public function get_prof()
    {
    
        // loads the associated object
        if (empty($this->prof))
            $this->prof = new Professor($this->prof_id);
    
        // returns the associated object
        return $this->prof;
    }

    /**
     * Method getAlunodisciplinas
     */
    public function getAlunodisciplinas()
    {
        $criteria = new TCriteria;
        $criteria->add(new TFilter('disc_id', '=', $this->id));
        return Alunodisciplina::getObjects( $criteria );
    }

    public function set_alunodisciplina_aluno_to_string($alunodisciplina_aluno_to_string)
    {
        if(is_array($alunodisciplina_aluno_to_string))
        {
            $values = Aluno::where('id', 'in', $alunodisciplina_aluno_to_string)->getIndexedArray('nome', 'nome');
            $this->alunodisciplina_aluno_to_string = implode(', ', $values);
        }
        else
        {
            $this->alunodisciplina_aluno_to_string = $alunodisciplina_aluno_to_string;
        }

        $this->vdata['alunodisciplina_aluno_to_string'] = $this->alunodisciplina_aluno_to_string;
    }

    public function get_alunodisciplina_aluno_to_string()
    {
        if(!empty($this->alunodisciplina_aluno_to_string))
        {
            return $this->alunodisciplina_aluno_to_string;
        }
    
        $values = Alunodisciplina::where('disc_id', '=', $this->id)->getIndexedArray('aluno_id','{aluno->nome}');
        return implode(', ', $values);
    }

    public function set_alunodisciplina_disc_to_string($alunodisciplina_disc_to_string)
    {
        if(is_array($alunodisciplina_disc_to_string))
        {
            $values = Disciplina::where('id', 'in', $alunodisciplina_disc_to_string)->getIndexedArray('nome', 'nome');
            $this->alunodisciplina_disc_to_string = implode(', ', $values);
        }
        else
        {
            $this->alunodisciplina_disc_to_string = $alunodisciplina_disc_to_string;
        }

        $this->vdata['alunodisciplina_disc_to_string'] = $this->alunodisciplina_disc_to_string;
    }

    public function get_alunodisciplina_disc_to_string()
    {
        if(!empty($this->alunodisciplina_disc_to_string))
        {
            return $this->alunodisciplina_disc_to_string;
        }
    
        $values = Alunodisciplina::where('disc_id', '=', $this->id)->getIndexedArray('disc_id','{disc->nome}');
        return implode(', ', $values);
    }

    
}

