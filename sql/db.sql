CREATE DATABASE IF NOT EXISTS proj_game;
USE proj_game;

CREATE TABLE IF NOT EXISTS usuarios(
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nome_usuario VARCHAR(150) UNIQUE NOT NULL,
    senha_usuario VARCHAR(255) NOT NULL,
    genero_usuario VARCHAR(1) NOT NULL,
    status_usuario VARCHAR(15) NOT NULL,
    permissao_usuario VARCHAR(10) NOT NULL, 
    data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS arquivos(
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    nome_arquivo VARCHAR(100) NOT NULL,
    conteudo LONGTEXT NOT NULL,
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    atualizado_em DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE IF NOT EXISTS relatorios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    xml_id INT NOT NULL,
    usuario_id INT NOT NULL,
    nome_relatorio VARCHAR(100) NOT NULL,
    gerado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    conteudo LONGTEXT NOT NULL,
    FOREIGN KEY (xml_id) REFERENCES xmls(id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE IF NOT EXISTS logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    acao VARCHAR(50) NOT NULL,
    descricao TEXT,
    data_hora DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

INSERT INTO usuarios(nome_usuario,senha_usuario,genero_usuario,status_usuario,permissao_usuario)VALUES('admin','$2y$10$E9Tg1jhxKC6pDlmU8pFJBu8vzoYdCbvEja2pF1LNZVT6vC0K9y7Q2
','M','Ativo','ADMIN');