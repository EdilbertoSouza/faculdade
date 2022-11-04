CREATE TABLE acoes( 
      id  INT IDENTITY    NOT NULL  , 
      nome varchar  (50)   , 
      modulo varchar  (30)   , 
      status int  (1)     DEFAULT 1, 
 PRIMARY KEY (id)) ; 

CREATE TABLE aluno( 
      id  INT IDENTITY    NOT NULL  , 
      nome varchar  (30)   NOT NULL  , 
      ende varchar  (40)   , 
      sexo varchar  (1)   , 
      nasc datetime2   , 
      fone varchar  (15)   , 
 PRIMARY KEY (id)) ; 

CREATE TABLE alunodisciplina( 
      id  INT IDENTITY    NOT NULL  , 
      aluno_id int  (11)   NOT NULL  , 
      disc_id int  (11)   NOT NULL  , 
 PRIMARY KEY (id)) ; 

CREATE TABLE centro( 
      id  INT IDENTITY    NOT NULL  , 
      nome varchar  (30)   NOT NULL  , 
 PRIMARY KEY (id)) ; 

CREATE TABLE departamento( 
      id  INT IDENTITY    NOT NULL  , 
      nome varchar  (60)   NOT NULL  , 
      area_id int  (11)   NOT NULL  , 
 PRIMARY KEY (id)) ; 

CREATE TABLE disciplina( 
      id  INT IDENTITY    NOT NULL  , 
      nome varchar  (50)   NOT NULL  , 
      prof_id int  (11)   , 
      disc_id_pre int  (11)   , 
      depto_id int  (11)   NOT NULL  , 
 PRIMARY KEY (id)) ; 

CREATE TABLE funcionario( 
      id  INT IDENTITY    NOT NULL  , 
      nome varchar  (50)   , 
      admissao date   , 
      departamento_id int   , 
 PRIMARY KEY (id)) ; 

CREATE TABLE professor( 
      id  INT IDENTITY    NOT NULL  , 
      nome varchar  (50)   NOT NULL  , 
      ende varchar  (40)   , 
      sexo char  (1)   NOT NULL  , 
      nasc date   , 
      salario float   , 
 PRIMARY KEY (id)) ; 

 
  
 ALTER TABLE alunodisciplina ADD CONSTRAINT fk_alunodisciplina_1 FOREIGN KEY (aluno_id) references aluno(id); 
ALTER TABLE alunodisciplina ADD CONSTRAINT fk_alunodisciplina_2 FOREIGN KEY (disc_id) references disciplina(id); 
ALTER TABLE departamento ADD CONSTRAINT fk_departamento_1 FOREIGN KEY (area_id) references centro(id); 
ALTER TABLE disciplina ADD CONSTRAINT fk_disciplina_1 FOREIGN KEY (depto_id) references departamento(id); 
ALTER TABLE disciplina ADD CONSTRAINT fk_disciplina_3 FOREIGN KEY (prof_id) references professor(id); 
ALTER TABLE funcionario ADD CONSTRAINT fk_funcionario_1 FOREIGN KEY (departamento_id) references departamento(id); 

  
