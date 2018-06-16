CREATE TABLE tb_usuario (
	idusuario INT NULL AUTO_INCREMENT PRIMARY KEY, 
	deslogin VARCHAR(256) NOT NULL,
	dessenha VARCHAR(256) NOT NULL,
	dtcadastro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()
);

INSERT INTO tb_usuario (deslogin, dessenha) VALUE ('root','root');	

SELECT * FROM tb_usuario;

UPDATE tb_usuario SET dessenha = '123' WHERE idusuario = 1;

DELETE FROM tb_usuario WHERE idusuario = 1;

TRUNCATE TABLE tb_usuario;
