# Personal Blog

Sistema de blog desenvolvido com Laravel com o objetivo de consolidar conhecimentos em desenvolvimento web, arquitetura de software e boas práticas de programação.

O projeto permite o gerenciamento de publicações por meio de um painel administrativo, autenticação de usuários, upload de imagens e diferentes recursos do ecossistema Laravel.

---

## Funcionalidades

- Autenticação de usuários
- Verificação de e-mail
- Recuperação de senha
- CRUD completo de publicações
- Upload de imagens para os posts
- Categorias de publicações
- Respostas e comentários em posts
- Painel administrativo
- Controle de permissões e autorização
- Sistema de eventos e listeners
- Filas utilizando Redis
- Envio de e-mails utilizando Mailpit

---

## Arquitetura

O projeto foi desenvolvido seguindo uma arquitetura em camadas, buscando separar responsabilidades e facilitar manutenção e escalabilidade.

Principais padrões utilizados:

- Service Layer
- Repository Pattern
- DTO (Data Transfer Object)
- Events & Listeners
- Middleware
- Policies
- Eloquent ORM

---

## Tecnologias

### Back-end

- PHP 8
- Laravel 10

### Banco de Dados

- MySQL
- Redis

### Ferramentas

- Docker
- Docker Compose
- Mailpit

### Front-end

- Blade
- Bootstrap
- HTML
- CSS
- JavaScript

---

## Objetivo

Este projeto foi desenvolvido para praticar conceitos utilizados em aplicações reais utilizando Laravel, como organização em camadas, autenticação, autorização, eventos, filas, envio de e-mails e integração entre diferentes componentes do framework.

---

## Como executar

```bash
git clone https://github.com/Issler78/PersonalBlog

cd PersonalBlog

docker compose up -d
```

Após iniciar os containers:

```bash
composer install

php artisan key:generate

php artisan migrate

php artisan storage:link
```

Configure o arquivo `.env` antes de executar a aplicação.

