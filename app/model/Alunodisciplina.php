<?php

class Alunodisciplina extends TRecord
{
    const TABLENAME  = 'alunodisciplina';
    const PRIMARYKEY = 'id';
    const IDPOLICY   =  'serial'; // {max, serial}

    private $aluno;
    private $disc;

    

    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('aluno_id');
        parent::addAttribute('disc_id');
            
    }

    /**
     * Method set_aluno
     * Sample of usage: $var->aluno = $object;
     * @param $object Instance of Aluno
     */
    public function set_aluno(Aluno $object)
    {
        $this->aluno = $object;
        $this->aluno_id = $object->id;
    }

    /**
     * Method get_aluno
     * Sample of usage: $var->aluno->attribute;
     * @returns Aluno instance
     */
    public function get_aluno()
    {
    
        // loads the associated object
        if (empty($this->aluno))
            $this->aluno = new Aluno($this->aluno_id);
    
        // returns the associated object
        return $this->aluno;
    }
    /**
     * Method set_disciplina
     * Sample of usage: $var->disciplina = $object;
     * @param $object Instance of Disciplina
     */
    public function set_disc(Disciplina $object)
    {
        $this->disc = $object;
        $this->disc_id = $object->id;
    }

    /**
     * Method get_disc
     * Sample of usage: $var->disc->attribute;
     * @returns Disciplina instance
     */
    public function get_disc()
    {
    
        // loads the associated object
        if (empty($this->disc))
            $this->disc = new Disciplina($this->disc_id);
    
        // returns the associated object
        return $this->disc;
    }

    
}

