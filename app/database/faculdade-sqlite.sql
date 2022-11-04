PRAGMA foreign_keys=OFF; 

CREATE TABLE acoes( 
      id  INTEGER    NOT NULL  , 
      nome varchar  (50)   , 
      modulo varchar  (30)   , 
      status int  (1)     DEFAULT 1, 
 PRIMARY KEY (id)) ; 

CREATE TABLE aluno( 
      id  INTEGER    NOT NULL  , 
      nome varchar  (30)   NOT NULL  , 
      ende varchar  (40)   , 
      sexo varchar  (1)   , 
      nasc datetime   , 
      fone varchar  (15)   , 
 PRIMARY KEY (id)) ; 

CREATE TABLE alunodisciplina( 
      id  INTEGER    NOT NULL  , 
      aluno_id int  (11)   NOT NULL  , 
      disc_id int  (11)   NOT NULL  , 
 PRIMARY KEY (id),
FOREIGN KEY(aluno_id) REFERENCES aluno(id),
FOREIGN KEY(disc_id) REFERENCES disciplina(id)) ; 

CREATE TABLE centro( 
      id  INTEGER    NOT NULL  , 
      nome varchar  (30)   NOT NULL  , 
 PRIMARY KEY (id)) ; 

CREATE TABLE departamento( 
      id  INTEGER    NOT NULL  , 
      nome varchar  (60)   NOT NULL  , 
      area_id int  (11)   NOT NULL  , 
 PRIMARY KEY (id),
FOREIGN KEY(area_id) REFERENCES centro(id)) ; 

CREATE TABLE disciplina( 
      id  INTEGER    NOT NULL  , 
      nome varchar  (50)   NOT NULL  , 
      prof_id int  (11)   , 
      disc_id_pre int  (11)   , 
      depto_id int  (11)   NOT NULL  , 
 PRIMARY KEY (id),
FOREIGN KEY(depto_id) REFERENCES departamento(id),
FOREIGN KEY(prof_id) REFERENCES professor(id)) ; 

CREATE TABLE funcionario( 
      id  INTEGER    NOT NULL  , 
      nome varchar  (50)   , 
      admissao date   , 
      departamento_id int   , 
 PRIMARY KEY (id),
FOREIGN KEY(departamento_id) REFERENCES departamento(id)) ; 

CREATE TABLE professor( 
      id  INTEGER    NOT NULL  , 
      nome varchar  (50)   NOT NULL  , 
      ende varchar  (40)   , 
      sexo char  (1)   NOT NULL  , 
      nasc date   , 
      salario double   , 
 PRIMARY KEY (id)) ; 

 
 
  
