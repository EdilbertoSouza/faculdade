SELECT setval('acoes_id_seq', coalesce(max(id),0) + 1, false) FROM acoes;
SELECT setval('aluno_id_seq', coalesce(max(id),0) + 1, false) FROM aluno;
SELECT setval('alunodisciplina_id_seq', coalesce(max(id),0) + 1, false) FROM alunodisciplina;
SELECT setval('centro_id_seq', coalesce(max(id),0) + 1, false) FROM centro;
SELECT setval('departamento_id_seq', coalesce(max(id),0) + 1, false) FROM departamento;
SELECT setval('disciplina_id_seq', coalesce(max(id),0) + 1, false) FROM disciplina;
SELECT setval('funcionario_id_seq', coalesce(max(id),0) + 1, false) FROM funcionario;
SELECT setval('professor_id_seq', coalesce(max(id),0) + 1, false) FROM professor;