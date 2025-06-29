# Easy
A Laravel-Based Minimalist Blogging Platform for Effortless Content Sharing
![Home Screen](/docs/images/home_screen.png)
![Blog Screen](/docs/images/demo_blog.png)

## Setting Up The Project

Clone the project and install composer packages and other depedencies
```shell
git clone https://github.com/WebDev-Group2-31N-AY2425/easy.git
cd easy
composer install
npm install && npm run dev
```

Create a `.env` file and setup keys and permissions
```shell
cp .env.example .env
php artisan storage:link
php artisan key:generate
```

Create an SQLite database file
```shell
# Run if on Linux/macOS
touch database/database.sqlite
```
```dos
# or on Windows
type nul > your_file.txt
```

Run database migrations, and (optionally) run the seeder for sample data
```shell
php artisan migrate:fresh
# Optional
php artisan db:seed
```

## Host The Project Locally

```shell
composer run dev    # Visit the website at http://127.0.0.1:8000
```