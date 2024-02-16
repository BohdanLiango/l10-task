<p align="center"><a href="#" target="_blank"><img src="https://icons.veryicon.com/png/o/miscellaneous/standard/task-32.png" width="400" alt="Laravel Logo"></a></p>

## Install

1. Clone the repository.
2. Install the Laravel extended repositories.
```
composer install
```
3. Set the basic config.
```
cp .env.example .env
```
4) Run key generate.
```
php artisan key:generate
```
5) Create database (MariaDB, Mysql).
6) In file .env change this line to your data.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
6) Run migrates.
```
php artisan migrate
```
## Enjoy

