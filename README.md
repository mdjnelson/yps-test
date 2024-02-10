## Getting Started

### Requirements

1. Install [Docker & Docker Compose](https://docs.docker.com/compose/install/).
2. Install [Composer](https://getcomposer.org/).
3. Install [Git](https://git-scm.com/downloads).
4. Install [PHP](https://www.php.net/manual/en/install.php).

### Launching application.

1. Run `git clone https://github.com/mdjnelson/yps-test.git yps-test`.
2. Run `cd yps-test`.
3. Run `cp .env.example .env`.
4. Run `composer install`.
5. Run `php artisan key:generate`.
6. Run `./vendor/bin/sail up -d`.
7. Run `./vendor/bin/sail artisan migrate --seed`.
8. Run `./vendor/bin/sail npm install`.
9. Run `./vendor/bin/sail npm run dev`.
10. Visit `http://localhost`.
