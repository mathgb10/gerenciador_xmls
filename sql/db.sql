CREATE DATABASE IF NOT EXISTS proj_game;
USE proj_game;

CREATE TABLE IF NOT EXISTS usuarios(
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nome_usuario VARCHAR(150) UNIQUE NOT NULL,
    senha_usuario VARCHAR(255) NOT NULL,
    email_usuario VARCHAR(255) NOT NULL UNIQUE,
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
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuario)
);

CREATE TABLE IF NOT EXISTS relatorios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    xml_id INT NOT NULL,
    usuario_id INT NOT NULL,
    nome_relatorio VARCHAR(100) NOT NULL,
    gerado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    conteudo LONGTEXT NOT NULL,
    FOREIGN KEY (xml_id) REFERENCES arquivos(id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuario)
);

CREATE TABLE IF NOT EXISTS logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    acao VARCHAR(50) NOT NULL,
    descricao TEXT,
    data_hora DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuario)
);

INSERT INTO usuarios(
    nome_usuario,
    senha_usuario,
    email_usuario,
    genero_usuario,
    status_usuario,
    permissao_usuario
)VALUES(
    'admin',
    '$2b$12$ZEdrFyLzc.prScThSUw9leyeRLeNUkQsuJxOC1BpjusJ74au5dg9m',
    'admin@admin.com',
    'M',
    'Ativo',
    'ADMIN'
);