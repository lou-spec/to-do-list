# To-Do List App — Starter

Um projeto simples de To-Do List com autenticação de utilizadores, utilizando PHP, MySQL e CSS.
O objetivo deste projeto é permitir que os utilizadores registem-se, façam login, criem, atualizem e apaguem tarefas, e façam logout.

🚀 Tecnologias Utilizadas

**PHP**

**MySQL (via XAMPP)**

**CSS3 / HTML5**

**XAMPP (Servidor local)**

## Passos rápidos

1. Configurar o servidor XAMPP

2. Ativar Apache e MySQL.

3. Criar uma base de dados no phpMyAdmin, por exemplo todo_db.

4. Importar o ficheiro database.sql (caso exista) ou criar as tabelas conforme o projeto.

5. Colocar os ficheiros no diretório do XAMPP

## Normalmente: C:\xampp\htdocs\seu-projeto

6. Configurar ligação à base de dados

7. Editar o ficheiro da database connection (db.php) com os dados do MySQL:

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'todolist';


8. Abrir o projeto no navegador

## Navegar até http://localhost/seu-projeto

# Funcionalidades

## Registo de utilizadores

## Login e Logout

## Criar tarefas

## Atualizar tarefas

## Apagar tarefas

# Estrutura do Projeto
.
├── db.php        # Configuração da base de dados
├── index.php         # Página principal / login
├── register.php      # Página de registo
├── home.php     # Página principal após login (lista de tarefas)
├── addtask.php   # Script para criar tarefas
├── update.php   # Script para atualizar tarefas
├── delete.php   # Script para apagar tarefas
├── logout.php        # Script de logout
├── todolist.sql      # Script SQL para criar a base de dados/tabelas e campos já preenchidos
└── css/
    ├── form.css          # Ficheiros de estilo para os formularios
    └── home.css          # Ficheiros de estilo para o home
    └── style.css         # Ficheiros de estilo para o index

**Observação**

1. Certifique-se de que o Apache e o MySQL do XAMPP estão a correr antes de aceder ao projeto.

