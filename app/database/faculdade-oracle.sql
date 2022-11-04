CREATE TABLE acoes( 
      id number(10)    NOT NULL , 
      nome varchar  (50)   , 
      modulo varchar  (30)   , 
      status number(10)  (1)    DEFAULT 1 , 
 PRIMARY KEY (id)) ; 

CREATE TABLE aluno( 
      id number(10)    NOT NULL , 
      nome varchar  (30)    NOT NULL , 
      ende varchar  (40)   , 
      sexo varchar  (1)   , 
      nasc timestamp(0)   , 
      fone varchar  (15)   , 
 PRIMARY KEY (id)) ; 

CREATE TABLE alunodisciplina( 
      id number(10)    NOT NULL , 
      aluno_id number(10)  (11)    NOT NULL , 
      disc_id number(10)  (11)    NOT NULL , 
 PRIMARY KEY (id)) ; 

CREATE TABLE centro( 
      id number(10)    NOT NULL , 
      nome varchar  (30)    NOT NULL , 
 PRIMARY KEY (id)) ; 

CREATE TABLE departamento( 
      id number(10)    NOT NULL , 
      nome varchar  (60)    NOT NULL , 
      area_id number(10)  (11)    NOT NULL , 
 PRIMARY KEY (id)) ; 

CREATE TABLE disciplina( 
      id number(10)    NOT NULL , 
      nome varchar  (50)    NOT NULL , 
      prof_id number(10)  (11)   , 
      disc_id_pre number(10)  (11)   , 
      depto_id number(10)  (11)    NOT NULL , 
 PRIMARY KEY (id)) ; 

CREATE TABLE funcionario( 
      id number(10)    NOT NULL , 
      nome varchar  (50)   , 
      admissao date   , 
      departamento_id number(10)   , 
 PRIMARY KEY (id)) ; 

CREATE TABLE professor( 
      id number(10)    NOT NULL , 
      nome varchar  (50)    NOT NULL , 
      ende varchar  (40)   , 
      sexo char  (1)    NOT NULL , 
      nasc date   , 
      salario binary_double   , 
 PRIMARY KEY (id)) ; 

 
  
 ALTER TABLE alunodisciplina ADD CONSTRAINT fk_alunodisciplina_1 FOREIGN KEY (aluno_id) references aluno(id); 
ALTER TABLE alunodisciplina ADD CONSTRAINT fk_alunodisciplina_2 FOREIGN KEY (disc_id) references disciplina(id); 
ALTER TABLE departamento ADD CONSTRAINT fk_departamento_1 FOREIGN KEY (area_id) references centro(id); 
ALTER TABLE disciplina ADD CONSTRAINT fk_disciplina_1 FOREIGN KEY (depto_id) references departamento(id); 
ALTER TABLE disciplina ADD CONSTRAINT fk_disciplina_3 FOREIGN KEY (prof_id) references professor(id); 
ALTER TABLE funcionario ADD CONSTRAINT fk_funcionario_1 FOREIGN KEY (departamento_id) references departamento(id); 
 CREATE SEQUENCE acoes_id_seq START WITH 1 INCREMENT BY 1; 

CREATE OR REPLACE TRIGGER acoes_id_seq_tr 

BEFORE INSERT ON acoes FOR EACH ROW 

WHEN 

(NEW.id IS NULL) 

BEGIN 

SELECT acoes_id_seq.NEXTVAL INTO :NEW.id FROM DUAL; 

END;
CREATE SEQUENCE aluno_id_seq START WITH 1 INCREMENT BY 1; 

CREATE OR REPLACE TRIGGER aluno_id_seq_tr 

BEFORE INSERT ON aluno FOR EACH ROW 

WHEN 

(NEW.id IS NULL) 

BEGIN 

SELECT aluno_id_seq.NEXTVAL INTO :NEW.id FROM DUAL; 

END;
CREATE SEQUENCE alunodisciplina_id_seq START WITH 1 INCREMENT BY 1; 

CREATE OR REPLACE TRIGGER alunodisciplina_id_seq_tr 

BEFORE INSERT ON alunodisciplina FOR EACH ROW 

WHEN 

(NEW.id IS NULL) 

BEGIN 

SELECT alunodisciplina_id_seq.NEXTVAL INTO :NEW.id FROM DUAL; 

END;
CREATE SEQUENCE centro_id_seq START WITH 1 INCREMENT BY 1; 

CREATE OR REPLACE TRIGGER centro_id_seq_tr 

BEFORE INSERT ON centro FOR EACH ROW 

WHEN 

(NEW.id IS NULL) 

BEGIN 

SELECT centro_id_seq.NEXTVAL INTO :NEW.id FROM DUAL; 

END;
CREATE SEQUENCE departamento_id_seq START WITH 1 INCREMENT BY 1; 

CREATE OR REPLACE TRIGGER departamento_id_seq_tr 

BEFORE INSERT ON departamento FOR EACH ROW 

WHEN 

(NEW.id IS NULL) 

BEGIN 

SELECT departamento_id_seq.NEXTVAL INTO :NEW.id FROM DUAL; 

END;
CREATE SEQUENCE disciplina_id_seq START WITH 1 INCREMENT BY 1; 

CREATE OR REPLACE TRIGGER disciplina_id_seq_tr 

BEFORE INSERT ON disciplina FOR EACH ROW 

WHEN 

(NEW.id IS NULL) 

BEGIN 

SELECT disciplina_id_seq.NEXTVAL INTO :NEW.id FROM DUAL; 

END;
CREATE SEQUENCE funcionario_id_seq START WITH 1 INCREMENT BY 1; 

CREATE OR REPLACE TRIGGER funcionario_id_seq_tr 

BEFORE INSERT ON funcionario FOR EACH ROW 

WHEN 

(NEW.id IS NULL) 

BEGIN 

SELECT funcionario_id_seq.NEXTVAL INTO :NEW.id FROM DUAL; 

END;
CREATE SEQUENCE professor_id_seq START WITH 1 INCREMENT BY 1; 

CREATE OR REPLACE TRIGGER professor_id_seq_tr 

BEFORE INSERT ON professor FOR EACH ROW 

WHEN 

(NEW.id IS NULL) 

BEGIN 

SELECT professor_id_seq.NEXTVAL INTO :NEW.id FROM DUAL; 

END;
 
  
