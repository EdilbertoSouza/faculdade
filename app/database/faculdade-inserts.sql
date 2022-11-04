INSERT INTO aluno (id,nome,ende,sexo,nasc,fone) VALUES (1,'EDILBERTO SOUZA','R. 1 ','M',null,''); 

INSERT INTO centro (id,nome) VALUES (1,'CIÊNCIAS EXATAS'); 

INSERT INTO centro (id,nome) VALUES (2,'CIÊNCIAS HUMANAS'); 

INSERT INTO departamento (id,nome,area_id) VALUES (1,'MATEMATICA',1); 

INSERT INTO departamento (id,nome,area_id) VALUES (2,'FISICA',1); 

INSERT INTO departamento (id,nome,area_id) VALUES (3,'PEDAGOGIA',2); 

INSERT INTO departamento (id,nome,area_id) VALUES (4,'SOCIOLOGIA',2); 

INSERT INTO disciplina (id,nome,prof_id,disc_id_pre,depto_id) VALUES (1,'MATEMATICA 1',1,null,1); 

INSERT INTO disciplina (id,nome,prof_id,disc_id_pre,depto_id) VALUES (2,'MATEMATICA 2',1,null,1); 

INSERT INTO disciplina (id,nome,prof_id,disc_id_pre,depto_id) VALUES (3,'GEOMETRIA EUCLIDIANA',2,null,1); 

INSERT INTO disciplina (id,nome,prof_id,disc_id_pre,depto_id) VALUES (4,'FISICA I',2,null,2); 

INSERT INTO disciplina (id,nome,prof_id,disc_id_pre,depto_id) VALUES (5,'FISICA II',2,null,2); 

INSERT INTO disciplina (id,nome,prof_id,disc_id_pre,depto_id) VALUES (6,'DIDÁTICA',3,null,3); 

INSERT INTO disciplina (id,nome,prof_id,disc_id_pre,depto_id) VALUES (7,'FUNDAMENTOS DA EDUCAÇÃO',3,null,3); 

INSERT INTO disciplina (id,nome,prof_id,disc_id_pre,depto_id) VALUES (8,'CURRÍCULO ESCOLAR',4,null,4); 

INSERT INTO disciplina (id,nome,prof_id,disc_id_pre,depto_id) VALUES (9,'FUNDAMENTOS DA EDUCAÇÃO',4,null,4); 

INSERT INTO professor (id,nome,ende,sexo,nasc,salario) VALUES (1,'GLAUBER SUZANO','','M',null,15000); 

INSERT INTO professor (id,nome,ende,sexo,nasc,salario) VALUES (2,'MARLON SUZANO','','M',null,14000); 

INSERT INTO professor (id,nome,ende,sexo,nasc,salario) VALUES (3,'DEBORA FARIAS','','F',null,14000); 

INSERT INTO professor (id,nome,ende,sexo,nasc,salario) VALUES (4,'PEDRO FARIAS','','M',null,13000); 
