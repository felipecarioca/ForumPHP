CREATE TABLE usuario (
	id_usuario int(8) NOT NULL AUTO_INCREMENT,
	nome varchar(255) NOT NULL,
	senha varchar(64) NOT NULL,
	usuario varchar(32) NOT NULL,
	PRIMARY KEY (id_usuario)
);

INSERT INTO usuario (id_usuario, nome, senha, usuario) VALUES(1, 'Felipe Pereira', '81dc9bdb52d04dc20036dbd8313ed055', 'felipe');
INSERT INTO usuario (id_usuario, nome, senha, usuario) VALUES(2, 'Professor Thiago', '81dc9bdb52d04dc20036dbd8313ed055', 'professor');

CREATE TABLE secao (
	id_secao int(8) NOT NULL AUTO_INCREMENT,
	descricao varchar(255) NOT NULL,
	PRIMARY KEY (id_secao)
);

INSERT INTO secao VALUES (1, 'Blackout');
INSERT INTO secao VALUES (2, 'Multiplayer');
INSERT INTO secao VALUES (3, 'Zombies');

CREATE TABLE forum (
	id_forum int(8) NOT NULL AUTO_INCREMENT,
	id_secao int(8) NOT NULL,
	PRIMARY KEY (id_forum),
    FOREIGN KEY (id_secao) REFERENCES secao (id_secao)
);

INSERT INTO forum VALUES (1, 1);
INSERT INTO forum VALUES (2, 2);
INSERT INTO forum VALUES (3, 3);

CREATE TABLE topico (
	id_topico int(8) NOT NULL AUTO_INCREMENT,
	id_forum int(8) NOT NULL,
	descricao varchar(255) NOT NULL,
	id_usuario int(8) NOT NULL,
	data_cadastro char(10) NULL,
	PRIMARY KEY (id_topico),
    FOREIGN KEY (id_forum) REFERENCES forum (id_forum)
);

CREATE TABLE post (
	id_post int(8) NOT NULL AUTO_INCREMENT,
	id_topico int(8) NOT NULL,
	texto TEXT NOT NULL,
	id_usuario int(8) NOT NULL,
	data_cadastro char(10) NULL,
	PRIMARY KEY (id_post),
    FOREIGN KEY (id_topico) REFERENCES topico (id_topico)
);

CREATE TABLE comentario (
	id_comentario int(8) NOT NULL AUTO_INCREMENT,
	id_post int(8) NOT NULL,
	texto TEXT NOT NULL,
	id_usuario int(8) NOT NULL,
	data_cadastro char(10) NULL,
	PRIMARY KEY (id_comentario),
    FOREIGN KEY (id_post) REFERENCES post (id_post)
);