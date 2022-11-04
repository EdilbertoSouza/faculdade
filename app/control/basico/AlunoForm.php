<?php

class AlunoForm extends TPage
{
    protected $form;
    private $formFields = [];
    private static $database = 'faculdade';
    private static $activeRecord = 'Aluno';
    private static $primaryKey = 'id';
    private static $formName = 'form_AlunoForm';

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
        $this->form->setFormTitle("Cadastro de Aluno");


        $id = new TEntry('id');
        $nome = new TEntry('nome');
        $ende = new TEntry('ende');
        $sexo = new TEntry('sexo');
        $nasc = new TDate('nasc');
        $fone = new TEntry('fone');

        $nome->addValidation("Nome", new TRequiredValidator()); 

        $id->setEditable(false);
        $nasc->setDatabaseMask('yyyy-mm-dd');

        $nasc->setMask('dd/mm/yyyy');
        $fone->setMask('(##) #####-####');

        $sexo->setMaxLength(1);
        $nome->setMaxLength(30);
        $ende->setMaxLength(40);
        $fone->setMaxLength(15);

        $id->setSize(100);
        $nasc->setSize(150);
        $nome->setSize('100%');
        $ende->setSize('100%');
        $sexo->setSize('100%');
        $fone->setSize('100%');

        $row1 = $this->form->addFields([new TLabel("Id:", null, '14px', null)],[$id],[new TLabel("Nome:", '#ff0000', '14px', null)],[$nome]);
        $row2 = $this->form->addFields([new TLabel("Ende:", null, '14px', null)],[$ende],[new TLabel("Sexo:", null, '14px', null)],[$sexo]);
        $row3 = $this->form->addFields([new TLabel("Nascimento:", null, '14px', null)],[$nasc],[new TLabel("Telefone:", null, '14px', null)],[$fone]);

        // create the form actions
        $btn_onsave = $this->form->addAction("Salvar", new TAction([$this, 'onSave']), 'fas:save #ffffff');
        $this->btn_onsave = $btn_onsave;
        $btn_onsave->addStyleClass('btn-primary'); 

        $btn_onclear = $this->form->addAction("Limpar formulário", new TAction([$this, 'onClear']), 'fas:eraser #dd5a43');
        $this->btn_onclear = $btn_onclear;

        $btn_onshow = $this->form->addAction("Voltar", new TAction(['AlunoList', 'onShow']), 'fas:arrow-left #000000');
        $this->btn_onshow = $btn_onshow;

        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 100%';
        $container->class = 'form-container';
        if(empty($param['target_container']))
        {
            $container->add(TBreadCrumb::create(["Básico","Cadastro de aluno"]));
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

            $object = new Aluno(); // create an empty object 

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
            TApplication::loadPage('AlunoList', 'onShow', $loadPageParam); 

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

                $object = new Aluno($key); // instantiates the Active Record 

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

