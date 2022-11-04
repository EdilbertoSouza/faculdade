CREATE TABLE acoes( 
      id  SERIAL    NOT NULL  , 
      nome varchar  (50)   , 
      modulo varchar  (30)   , 
      status integer     DEFAULT 1, 
 PRIMARY KEY (id)) ; 

CREATE TABLE aluno( 
      id  SERIAL    NOT NULL  , 
      nome varchar  (30)   NOT NULL  , 
      ende varchar  (40)   , 
      sexo varchar  (1)   , 
      nasc timestamp   , 
      fone varchar  (15)   , 
 PRIMARY KEY (id)) ; 

CREATE TABLE alunodisciplina( 
      id  SERIAL    NOT NULL  , 
      aluno_id integer   NOT NULL  , 
      disc_id integer   NOT NULL  , 
 PRIMARY KEY (id)) ; 

CREATE TABLE centro( 
      id  SERIAL    NOT NULL  , 
      nome varchar  (30)   NOT NULL  , 
 PRIMARY KEY (id)) ; 

CREATE TABLE departamento( 
      id  SERIAL    NOT NULL  , 
      nome varchar  (60)   NOT NULL  , 
      area_id integer   NOT NULL  , 
 PRIMARY KEY (id)) ; 

CREATE TABLE disciplina( 
      id  SERIAL    NOT NULL  , 
      nome varchar  (50)   NOT NULL  , 
      prof_id integer   , 
      disc_id_pre integer   , 
      depto_id integer   NOT NULL  , 
 PRIMARY KEY (id)) ; 

CREATE TABLE funcionario( 
      id  SERIAL    NOT NULL  , 
      nome varchar  (50)   , 
      admissao date   , 
      departamento_id integer   , 
 PRIMARY KEY (id)) ; 

CREATE TABLE professor( 
      id  SERIAL    NOT NULL  , 
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

  
