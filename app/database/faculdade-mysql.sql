CREATE TABLE acoes( 
      `id`  INT  AUTO_INCREMENT    NOT NULL  , 
      `nome` varchar  (50)   , 
      `modulo` varchar  (30)   , 
      `status` int     DEFAULT 1, 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE aluno( 
      `id`  INT  AUTO_INCREMENT    NOT NULL  , 
      `nome` varchar  (30)   NOT NULL  , 
      `ende` varchar  (40)   , 
      `sexo` varchar  (1)   , 
      `nasc` datetime   , 
      `fone` varchar  (15)   , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE alunodisciplina( 
      `id`  INT  AUTO_INCREMENT    NOT NULL  , 
      `aluno_id` int   NOT NULL  , 
      `disc_id` int   NOT NULL  , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE centro( 
      `id`  INT  AUTO_INCREMENT    NOT NULL  , 
      `nome` varchar  (30)   NOT NULL  , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE departamento( 
      `id`  INT  AUTO_INCREMENT    NOT NULL  , 
      `nome` varchar  (60)   NOT NULL  , 
      `area_id` int   NOT NULL  , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE disciplina( 
      `id`  INT  AUTO_INCREMENT    NOT NULL  , 
      `nome` varchar  (50)   NOT NULL  , 
      `prof_id` int   , 
      `disc_id_pre` int   , 
      `depto_id` int   NOT NULL  , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE funcionario( 
      `id`  INT  AUTO_INCREMENT    NOT NULL  , 
      `nome` varchar  (50)   , 
      `admissao` date   , 
      `departamento_id` int   , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE professor( 
      `id`  INT  AUTO_INCREMENT    NOT NULL  , 
      `nome` varchar  (50)   NOT NULL  , 
      `ende` varchar  (40)   , 
      `sexo` char  (1)   NOT NULL  , 
      `nasc` date   , 
      `salario` double   , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

 
  
 ALTER TABLE alunodisciplina ADD CONSTRAINT fk_alunodisciplina_1 FOREIGN KEY (aluno_id) references aluno(id); 
ALTER TABLE alunodisciplina ADD CONSTRAINT fk_alunodisciplina_2 FOREIGN KEY (disc_id) references disciplina(id); 
ALTER TABLE departamento ADD CONSTRAINT fk_departamento_1 FOREIGN KEY (area_id) references centro(id); 
ALTER TABLE disciplina ADD CONSTRAINT fk_disciplina_1 FOREIGN KEY (depto_id) references departamento(id); 
ALTER TABLE disciplina ADD CONSTRAINT fk_disciplina_3 FOREIGN KEY (prof_id) references professor(id); 
ALTER TABLE funcionario ADD CONSTRAINT fk_funcionario_1 FOREIGN KEY (departamento_id) references departamento(id); 

  
