CREATE TABLE tb_usuarios (
	idusuario INT NOT NULL IDENTITY PRIMARY KEY,
	deslogin VARCHAR (64) NOT NULL,
	dessenha VARCHAR (256) NOT NULL,
	dtcadastro DATETIME NOT NULL DEFAULT GETDATE()
);

SELECT * FROM tb_usuarios;

INSERT INTO tb_usuarios (deslogin, dessenha) VALUES ('user', '123456');