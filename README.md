# Skeleton Symfony 7 + PHP 8.4 + PostgreSQL 17

## DevContainer

### 1. Usage

1. Copy the `.devcontainer` folder into the root of your Symfony project.
2. Open the project in Visual Studio Code.
3. Click on the green icon in the bottom left corner and select `Reopen in Container`.
4. Execute `composer install` from the terminal.
5. Execute `symfony serve --no-tls` and go to [http://localhost:{BACKEND_PORT}](http://localhost:{BACKEND_PORT}).

### 2. Ports Forwarding

By default, the containers forward the following ports:

- The `dev` service in the `docker-compose.yml` file forwards port `8000` from the PHP container to the host machine. You can change the port by modifying the `ports` field in the `dev` service.
- The `mailer` service forwards port `8025` from the Mailer container to the host machine. You can change the port by modifying the `ports` field in the `mailer` service.

### 3. Features

The Symfony DevContainer comes with three containers:

- **PHP 8.4** (from the official Docker image `php:8.4-cli`) with:
  - Composer
  - Symfony CLI
  - Some PHP extensions (e.g., xdebug, intl, pdo_pgsql)
- **PostgreSQL 17** (from the official Docker image `postgres:17-alpine`)
- **Mailer** (from `axllent/mailpit`)

### 4. Customization

You can customize the containers by editing the `.devcontainer/compose.yml` file.

If you need to install additional PHP extensions or specific versions of software:

1. Modify the `Dockerfile`, build, and push the image to your Docker registry.
2. Update the `image` field in the `dev` service in the `compose.yml` file.
3. Rebuild with:
   ```bash
   docker build -t florianfish35/symfony-php-dev-container . --no-cache
