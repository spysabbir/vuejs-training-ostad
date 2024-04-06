# Zero Config e-Commerce Boilerplate with Laravel Sanctum
## Setup instructions
### Download & Extract the zip
```
Course -> Mastering Vue.Js -> Resource -> Module 17 -> ecom-backend
Extract the zip
```
### Install dependency
```bash
cd ecom-backend
composer install
```
### Copy `.env.example` to `.env` file
```bash
cp .env.example .env
```
### Connect Database
- Create a database in your mysql. e.g. ecom-backend
- Place database credentials in you `.env` file
```env
DB_DATABASE=ecom-backend
DB_USERNAME=<DATABASE-USER> #this is database user name
DB_PASSWORD=<DATABASE-PASSWORD> #this is database password
```
### Run database migration
```bash
php artisan migrate --seed
```
### Generate App key
```bash
php artisan key:generate
```
### Run Application
```bash
php artisan serve
```