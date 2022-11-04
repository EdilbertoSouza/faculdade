<?php

class Aluno extends TRecord
{
    const TABLENAME  = 'aluno';
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
        parent::addAttribute('fone');
            
    }

    /**
     * Method getAlunodisciplinas
     */
    public function getAlunodisciplinas()
    {
        $criteria = new TCriteria;
        $criteria->add(new TFilter('aluno_id', '=', $this->id));
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
    
        $values = Alunodisciplina::where('aluno_id', '=', $this->id)->getIndexedArray('aluno_id','{aluno->nome}');
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
    
        $values = Alunodisciplina::where('aluno_id', '=', $this->id)->getIndexedArray('disc_id','{disc->nome}');
        return implode(', ', $values);
    }

    
}

