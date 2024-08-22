# STIEI APP

APP buat skripsi

## Installation

Install STIEI-APP

```bash
composer install
```

```bash
npm install
```

Environment Configuration Create a copy of the .env.example file and rename it to .env:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

Set Up the Database on .env

```bash
php artisan migrate
```

```bash
php artisan db:seed
```

Start the Laravel development server:

```bash
npm run dev
```

```bash
php artisan serve
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
