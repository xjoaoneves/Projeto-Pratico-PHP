SISTEMA DE CADASTRO DE PRODUTOS
==========================

Tema Escolhido:
Sistema de Cadastro de Produtos com Controle de Usuários

Resumo do Funcionamento:
Este sistema permite que usuários façam login e cadastrem seus próprios produtos. Cada usuário só pode visualizar, editar e excluir os produtos que ele mesmo cadastrou. O sistema possui controle de acesso por login e senha e garante que cada usuário tenha seu próprio ambiente de cadastro.

Usuário/Senha de Teste:
Usuário: joao
Senha: 12345

Usuário/Senha de Teste 2:
Usuário: teste
Senha: teste

Passos para Instalação do Banco:

1. Acesse seu servidor de banco de dados (MySQL).
2. Crie o banco de dados com o nome:

```sql
CREATE DATABASE bd_cadastro;

CREATE TABLE tb_usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario VARCHAR(50) NOT NULL,
    senha VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL
);

CREATE TABLE tb_produtos (
    id_produto INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    quantidade INT NOT NULL,
    usuario_id INT NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES tb_usuarios(id)
);
