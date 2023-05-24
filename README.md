# README - Jump - API REST

## Pré-requisitos
- PHP >= 8.1
- Composer
- MySQL (ou outro banco de dados suportado pelo Laravel)

<br>

## Instalação

<br>

## 1. Clone o repositório:

git clone https://github.com/seu-usuario/seu-projeto.git

<br>

## 2. Entre no diretório do projeto:

```bash
cd seu-projeto 
```

<br>

## 3. Instale as dependências do Composer:

```bash
composer install
```
<br>

## 4. Copie o arquivo de configuração do ambiente:

```bash
cp .env.example .env
```

<br>

## 5. Gere a chave de criptografia do Laravel:

```bash
php artisan key:generate
```

<br>

## 6. Configure as variáveis de ambiente no arquivo `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=8889
DB_DATABASE=test-jump
DB_USERNAME=root
DB_PASSWORD="root"
```
<br>

## 7. Execute as migrações do banco de dados:

```bash
php artisan migrate
```
<br>

## 8. Execute as Seeder do banco de dados:

```bash
php artisan db:seed
```

<br>

## 9. Inicie o servidor local:

```bash
php artisan serve
```
<br>

## Uso
Acesse o projeto em seu navegador utilizando a URL fornecida pelo comando `php artisan serve`.
<br><br>
# Documentação API 

## Para ter acesso a documentação da api  [Acesse - Postman](https://documenter.getpostman.com/view/19815520/2s93m5zgaQ#01610057-c73a-42af-a9fd-ae4afe2a82a3)



