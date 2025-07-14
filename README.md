# Teste Prático :upd8

## Pré-requisitos

Antes de iniciar, certifique-se de ter os seguintes itens instalados:

  * **PHP:** Versão 8.0 ou superior (recomendado).
  * **Composer:** Um gerenciador de dependências para PHP.
  * **MySQL:** Ou outro sistema de banco de dados compatível.

-----

## Instalação

1.  **Clone o repositório:**

    ```bash
    git clone git@github.com:fdanielarruda/admissao-upd8.git
    cd admissao-upd8
    ```

2.  **Instale as dependências PHP:**

    ```bash
    composer install
    ```

3.  **Configure seu arquivo de ambiente:**

    Copie o arquivo `.env.example` para `.env`:

    ```bash
    cp .env.example .env
    ```

    Em seguida, abra o arquivo `.env` recém-criado e configure sua conexão com o banco de dados. Geralmente, você precisará definir `DB_DATABASE`, `DB_USERNAME` e `DB_PASSWORD`.

4.  **Gere uma chave de aplicação:**

    ```bash
    php artisan key:generate
    ```

-----

## Configuração do Banco de Dados

1.  **Execute as migrações:** Isso criará as tabelas necessárias em seu banco de dados.

    ```bash
    php artisan migrate
    ```

2.  **Popule o banco de dados (seed):** Isso irá preencher seu banco de dados com dados iniciais, incluindo o usuário administrativo padrão.

    ```bash
    php artisan db:seed
    ```

-----

## Executando a Aplicação

1.  **Inicie o servidor de desenvolvimento:**

    ```bash
    php artisan serve
    ```

    Isso geralmente iniciará o servidor em `http://127.0.0.1:8000`.

-----

## Credenciais de Login Padrão

Após popular o banco de dados, você pode fazer login com as seguintes credenciais:

  * **Email:** `admin@root.com`
  * **Senha:** `senha123`