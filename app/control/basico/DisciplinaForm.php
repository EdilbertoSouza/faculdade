<?php

class DisciplinaForm extends TPage
{
    protected $form;
    private $formFields = [];
    private static $database = 'faculdade';
    private static $activeRecord = 'Disciplina';
    private static $primaryKey = 'id';
    private static $formName = 'form_DisciplinaForm';

    /**
     * Form constructor
     * @param $param Request
     */
    public function __construct( $param )
    {
        parent::__construct();

        if(!empty($param['target_container']))
        {
            $this->adianti_target_container = $param['target_container'];
        }

        // creates the form
        $this->form = new BootstrapFormBuilder(self::$formName);
        // define the form title
        $this->form->setFormTitle("Cadastro de disciplina");


        $id = new TEntry('id');
        $nome = new TEntry('nome');
        $prof_id = new TDBCombo('prof_id', 'faculdade', 'Professor', 'id', '{nome}','nome asc'  );
        $disc_id_pre = new TEntry('disc_id_pre');
        $depto_id = new TDBCombo('depto_id', 'faculdade', 'Departamento', 'id', '{nome}','nome asc'  );

        $nome->addValidation("Nome", new TRequiredValidator()); 
        $depto_id->addValidation("Departamento", new TRequiredValidator()); 

        $nome->setMaxLength(50);
        $id->setEditable(false);

        $prof_id->enableSearch();
        $depto_id->enableSearch();

        $id->setSize(100);
        $nome->setSize('100%');
        $prof_id->setSize('100%');
        $depto_id->setSize('100%');
        $disc_id_pre->setSize('100%');

        $row1 = $this->form->addFields([new TLabel("Id:", null, '14px', null)],[$id],[new TLabel("Nome:", '#ff0000', '14px', null)],[$nome]);
        $row2 = $this->form->addFields([new TLabel("Professor:", null, '14px', null)],[$prof_id],[new TLabel("Pré-requisito:", null, '14px', null)],[$disc_id_pre]);
        $row3 = $this->form->addFields([new TLabel("Departamento:", '#ff0000', '14px', null)],[$depto_id],[],[]);

        // create the form actions
        $btn_onsave = $this->form->addAction("Salvar", new TAction([$this, 'onSave']), 'fas:save #ffffff');
        $this->btn_onsave = $btn_onsave;
        $btn_onsave->addStyleClass('btn-primary'); 

        $btn_onclear = $this->form->addAction("Limpar formulário", new TAction([$this, 'onClear']), 'fas:eraser #dd5a43');
        $this->btn_onclear = $btn_onclear;

        $btn_onshow = $this->form->addAction("Voltar", new TAction(['DisciplinaList', 'onShow']), 'fas:arrow-left #000000');
        $this->btn_onshow = $btn_onshow;

        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 100%';
        $container->class = 'form-container';
        if(empty($param['target_container']))
        {
            $container->add(TBreadCrumb::create(["Básico","Cadastro de disciplina"]));
        }
        $container->add($this->form);

        parent::add($container);

    }

    public function onSave($param = null) 
    {
        try
        {
            TTransaction::open(self::$database); // open a transaction

            $messageAction = null;

            $this->form->validate(); // validate form data

            $object = new Disciplina(); // create an empty object 

            $data = $this->form->getData(); // get form data as array
            $object->fromArray( (array) $data); // load the object with data

            $object->store(); // save the object 

            $loadPageParam = [];

            if(!empty($param['target_container']))
            {
                $loadPageParam['target_container'] = $param['target_container'];
            }

            // get the generated {PRIMARY_KEY}
            $data->id = $object->id; 

            $this->form->setData($data); // fill form data
            TTransaction::close(); // close the transaction

            TToast::show('success', "Registro salvo", 'topRight', 'far:check-circle');
            TApplication::loadPage('DisciplinaList', 'onShow', $loadPageParam); 

        }
        catch (Exception $e) // in case of exception
        {
            //</catchAutoCode> 

            new TMessage('error', $e->getMessage()); // shows the exception error message
            $this->form->setData( $this->form->getData() ); // keep form data
            TTransaction::rollback(); // undo all pending operations
        }
    }

    public function onEdit( $param )
    {
        try
        {
            if (isset($param['key']))
            {
                $key = $param['key'];  // get the parameter $key
                TTransaction::open(self::$database); // open a transaction

                $object = new Disciplina($key); // instantiates the Active Record 

                $this->form->setData($object); // fill the form 

                TTransaction::close(); // close the transaction 
            }
            else
            {
                $this->form->clear();
            }
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
    }

    /**
     * Clear form data
     * @param $param Request
     */
    public function onClear( $param )
    {
        $this->form->clear(true);

    }

    public function onShow($param = null)
    {

    } 

}

