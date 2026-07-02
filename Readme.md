# 🐾 Sistema PetShop - Laravel 13

Sistema de gestão de petshop desenvolvido com Laravel 13, implementando todos os conceitos exigidos.

## Conceitos Implementados

| Conceito | Implementação |
|---|---|
| **Rotas** | `routes/app.php` — resources + auditorias |
| **Controllers** | 6 controllers (Especie, Raca, Cliente, Pet, Servico, Agendamento) |
| **Views / Blade** | Views completas com Bootstrap 5.3 |
| **Migration + Seeder** | 6 tabelas + seeders com dados iniciais |
| **Model + ORM** | Relacionamentos hasMany / belongsTo |
| **Autenticação (Breeze)** | Login, registro, perfil |
| **Autorização (Policies)** | 6 policies com `Gate::authorize` |
| **Padrão CSR** | Controller → Service → Repository para todos os módulos |
| **Auditoria** | `owen-it/laravel-auditing` em todos os models |

## Entidades

- **Espécie** (Cão, Gato, etc.)
- **Raça** (Labrador, Persa, etc.) — pertence a Espécie
- **Cliente** — dono dos pets
- **Pet** — pertence a Cliente e Raça
- **Serviço** (Banho, Tosa, etc.)
- **Agendamento** — Pet + Serviço + Data/Hora + Status

## Perfis de Acesso

| Perfil | Acesso |
|---|---|
| **Atendente** | Clientes, Pets, Agendamentos (sem delete) + ver Espécies/Raças/Serviços |
| **Gerente** | Acesso total a todos os módulos |

## Usuários Iniciais (seed)

| E-mail | Senha | Perfil |
|---|---|---|
| `atendente@petshop.com` | `@1234@5678` | Atendente |
| `gerente@petshop.com` | `@1234@5678` | Gerente |

## Rodar com XAMPP

```bash

composer install
cp .env.example .env
# Editar .env: DB_DATABASE=petshop_db, DB_USERNAME=root, DB_PASSWORD=
php artisan key:generate
php artisan migrate --seed
npm install
npm run build
php artisan serve

```

## Detalhe

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=petshop_db
DB_USERNAME=root
DB_PASSWORD=