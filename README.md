# Sistema de Gestão Escolar

Sistema CRUD completo para gerenciamento de **Alunos**, **Turmas** e **Matrículas** desenvolvido com **Laravel 12** e interface profissional Bootstrap.

## ✨ Funcionalidades
- ✅ Cadastro, edição e exclusão de Alunos
- ✅ Cadastro, edição e exclusão de Turmas  
- ✅ Cadastro, edição e exclusão de Matrículas
- ✅ Interface responsiva e profissional
- ✅ Validações completas
- ✅ Navegação intuitiva entre módulos

## 📋 Pré-requisitos
- PHP 8.2+
- Composer
- Node.js (opcional, para assets)
- Banco SQLite (configurado por padrão)

## 🚀 Instalação Passo a Passo

### 1. Clonar o Repositório

git clone https://github.com/SEU-USUARIO/sistema-escolar.git

cd sistema-escolar

### 2. Instalar Dependências PHP

composer install

### 3. Configurar Ambiente

cp .env.example .env

php artisan key:generate

### 4. Configurar Banco de Dados
O projeto usa **SQLite** por padrão:

touch database/database.sqlite

php artisan migrate

### 5. Iniciar o Servidor

php artisan serve --port=8080

### 6. Acessar o Sistema

Abra no navegador: [**http://127.0.0.1:8080**](http://127.0.0.1:8080)
