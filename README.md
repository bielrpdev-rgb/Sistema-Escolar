# Estrutura Inicial Sistema de Gestão Escolar

Este repositório contém um sistema de gestão escolar desenvolvido em Laravel para gerenciar alunos, turmas e matrículas, demonstrando o uso de padrões de projeto na camada de aplicação.

A aplicação utiliza SQLite por padrão e já vem preparada para rodar localmente com o mínimo de configuração.

---

## Tecnologias

- PHP 8.2  
- Laravel 10  
- SQLite (banco de dados padrão)  
- Bootstrap 5.3  
- Composer

---

## Links Rápidos

- [Código-fonte do projeto](./)
- [CRUD de Alunos](./resources/views/alunos)
- [CRUD de Turmas](./resources/views/turmas)
- [CRUD de Matrículas](./resources/views/matriculas)
- [Controladores (Application Layer)](./app/Http/Controllers)
- [Models / Active Record](./app/Models)
- [Rotas da aplicação](./routes/web.php)
- [Migrations do banco de dados](./database/migrations)
- [Fluxo de Trabalho do Projeto](help/fluxo.md)

---

## Instalação
<details>
  <summary>Passo a passo</summary>   

1 - Clonar o Repositório
Primeiro, clone o repositório usando SSH ou HTTPS:
```
https://github.com/bielrpdev-rgb/Sistema-Escolar.git
```
2 - Navegar para o Diretório do Projeto
Mude para o diretório do projeto:
```
cd Sistema-escolar
```
3 - Instalação das dependências do PHP:
```
composer install
```
4 - Configurar ambiente
```
copy .env.example .env
php artisan key:generate
```
5 - Migrar Banco (SQLite automático)
```
php artisan migrate
```
6 - Executar Aplicação
```
php artisan serve
```

**✅ Acesse: [http://127.0.0.1:8000](http://127.0.0.1:8000)**

## 🎮 Uso

### Rotas Principais
| URL | Método | Descrição |
|-----|--------|-----------|
| `/` | GET | Welcome + Dashboard |
| `/alunos` | CRUD | Gerenciar alunos |
| `/turmas` | CRUD | Gerenciar turmas |
| `/matriculas` | CRUD | Gerenciar matrículas |

### Endpoints API (Query Object)
GET /turmas/1/alunos # Alunos da turma 1

GET /alunos/1/turmas # Turmas do aluno 1

## 🏗️ Arquitetura e Padrões

### Padrões Implementados

| Pattern | Implementação | Exemplo |
|---------|---------------|---------|
| **Active Record** | Eloquent Models | `Aluno::create($data)` + `$fillable` |
| **Transaction Script** | Controllers | `DB::transaction()` em `store/update/destroy` |
| **Query Object** | Eager Loading | `Matricula::with(['aluno', 'turma'])->get()` |

### Relacionamentos
Aluno 1:N Matricula N:1 Turma

Aluno 1:N Turmas (via Matricula)

Turma 1:N Alunos (via Matricula)

</details>
